<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Panel\PersonRequest;
use App\Http\Requests\Panel\CommentRequest;
use App\Http\Requests\Panel\EditCommentRequest;
use App\Http\Requests\Panel\LocationRequest;
use App\Http\Controllers\Controller;

use App\Country;
use App\Province;
use App\Person;
use App\Comment;
use App\Reporter;
use App\Contribution;

use Auth;
use Image;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class PersonController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index($status)
  {
    $user = Auth::user();

    $people = Person::where('status', '=', $status)->has('province')->orWhere('status', '=', $status)->whereHas('country', function($q){
      $q->where('province_id', '=', null);
    });

    $paginate = (Input::get('paginate')) ? Input::get('paginate') : 20;
    if ($paginate == 'all') {
      $paginate = 0;
    }

    $orderBy = Input::get('order-by');
    switch ($orderBy) {
      case 'name_asc':
        $field = 'name';
        $order = 'asc';
        break;
      case 'name_desc':
        $field = 'name';
        $order = 'desc';
        break;
      case 'surname_asc':
        $field = 'surname';
        $order = 'asc';
        break;
      case 'surname_desc':
        $field = 'surname';
        $order = 'desc';
        break;
      case 'created_at_asc':
        $field = 'created_at';
        $order = 'asc';
        break;
      case 'created_at_desc':
        $field = 'created_at';
        $order = 'desc';
        break;
      default:
        $field = 'created_at';
        $order = 'desc';
        break;
    }

    $search = Input::get('search');
    if ($search) {
      $province_id = Province::search($search)->first();
      if ($province_id) {
        $province_id = $province_id->id;
      }
      else {
        $province_id = '-1';
      }

      $country_id = Country::search($search)->first();
      if ($country_id) {
        $country_id = $country_id->id;
      }
      else {
        $country_id = '-1';
      }

      $people->search($search, $province_id, $country_id);
    }

    switch ($user->hierarchy) {
      case 2:
        $provinces = $user->country->provinces;
        foreach ($provinces as $province){
          $people = $people->orWhere('province_id', $province->id);
        }
        break;
      case 3:
        $people = $people->where('province_id', $user->province_id);
        break;
    }

    $people = $people->orderBy($field, $order)->paginate($paginate);

    if ($orderBy){
      $urlOrderBy = '?order-by=' . $orderBy;
    }
    else {
      $urlOrderBy = '';
    }

    if ($search){
      if ($orderBy) {
        $urlSearch = '&search=' . $search;
      }
      else {
        $urlSearch = '?search=' . $search;
      }
    }
    else {
      $urlSearch = '';
    }

    if ($paginate){
      if ($orderBy || $search){
        $urlPaginate = '&paginate=' . $paginate;
      }
      else {
        $urlPaginate = '?paginate=' . $paginate;
      }
    }

    $people->setPath(route('panel.people.index', $status) . $urlOrderBy . $urlSearch . $urlPaginate);

    $are_deleted_registers = !Person::onlyTrashed()->get()->isEmpty();

    return view('panel.people.index', compact('people', 'user', 'status', 'orderBy', 'search', 'paginate', 'are_deleted_registers'));
  }

  public function show($id)
  {
    $user = Auth::user();
    $person = Person::findOrFail($id);

    if (checkHierarchy($user, $person)){
      $person->birth_year = Carbon::today()->year - $person->birth_year;
      $person['missing_at'] = convertFromCarbonDate($person->missing_at);
      $person['found_at'] = convertFromCarbonDate($person->found_at);
      $person['closure_at'] = convertFromCarbonDate($person->closure_at);

      return view('panel.people.show', compact('person', 'user'));
    }
    else {
      return view('errors.401');
    }
  }

  public function create($status = '')
  {
    $user = Auth::user();

    $countries = Country::lists('name', 'id');
    $provinces = Province::has('country')->lists('name', 'id');
    $provinces_for_each_country = provincesForEachCountry(Country::get());

    return view('panel.people.create', compact('countries', 'provinces', 'provinces_for_each_country', 'user', 'status'));
  }

  public function store(PersonRequest $request)
  {
    $user = Auth::user();
    if ($request->province_id) {
      $province = Province::findOrFail($request->province_id);
    }
    else {
      $province = null;
    }

    if (checkHierarchy($user, null, $province)){
      if ($request->province_id == '') {
        $request['province_id'] = null;
      }
      $request['birth_year'] = Carbon::today()->year - $request->birth_year;
      $request['missing_at'] = convertToCarbonDate($request->missing_at);
      $request['found_at'] = convertToCarbonDate($request->found_at);
      $request['closure_at'] = convertToCarbonDate($request->closure_at);

      $person = Person::create($request->except(['reporter', 'image', 'date']));

      if ($request->hasFile('image')) {
        saveImage($person->id, 'people', 'input');
      }

      $reporter_request = $request->only(['reporter'])['reporter'];
      $reporter_request['person_id'] = $person->id;

      $reporter = Reporter::create($reporter_request);

      return redirect()->route('panel.people.show', [$person->id]);
    }
    else {
      return view('errors.401');
    }
  }

  public function edit($id)
  {
    $user = Auth::user();
    $person = Person::findOrFail($id);

    if (checkHierarchy($user, $person)){
      $person->birth_year = Carbon::today()->year - $person->birth_year;
      $person['missing_at'] = convertFromCarbonDate($person->missing_at);
      $person['found_at'] = convertFromCarbonDate($person->found_at);
      $person['closure_at'] = convertFromCarbonDate($person->closure_at);

      $countries = Country::lists('name', 'id');
      $provinces = Province::has('country')->lists('name', 'id');
      $provinces_for_each_country = provincesForEachCountry(Country::get());

      $reporter = $person->reporter;
      $status = $person->status;

      return view('panel.people.edit', compact('person', 'countries', 'provinces', 'provinces_for_each_country', 'user', 'reporter', 'status'));
    }
    else {
      return view('errors.401');
    }
  }

  public function update(PersonRequest $request, $id)
  {
    $user = Auth::user();
    $person = Person::findOrFail($id);

    if (checkHierarchy($user, $person)){
      if ($request->province_id == '') {
        $request['province_id'] = null;
      }
      $request['birth_year'] = Carbon::today()->year - $request->birth_year;
      $request['missing_at'] = convertToCarbonDate($request->missing_at);
      $request['found_at'] = convertToCarbonDate($request->found_at);
      $request['closure_at'] = convertToCarbonDate($request->closure_at);

      $person->update($request->except(['reporter', 'image', 'date']));

      $reporter = $person->reporter;
      $reporter->update($request->only(['reporter'])['reporter']);

      return redirect()->route('panel.people.show', [$id]);
    }
    else {
      return view('errors.401');
    }
  }

  public function destroy($id)
  {
    $user = Auth::user();
    $person = Person::findOrFail($id);

    if (checkHierarchy($user, $person)){
      $status = $person->status;
      $person->delete();

      return redirect()->route('panel.people.index', $status);
    }
    else {
      return view('errors.401');
    }
  }

  public function updateStatus($id, $status)
  {
    $user = Auth::user();
    $person = Person::findOrFail($id);

    if (checkHierarchy($user, $person)){
      $person->status = $status;
      $person->save();

      return redirect()->route('panel.people.show', [$id]);
    }
    else {
      return view('errors.401');
    }
  }

  public function updateImageExternally($id)
  {
    $user = Auth::user();
    $person = Person::findOrFail($id);

    if (checkHierarchy($user, $person)){
      $url = Input::get('url');
      saveImage($id, 'people', 'url', $url);

      return redirect()->route('panel.people.show', [$id, '#image-section']);
    }
    else {
      return view('errors.401');
    }
  }

  public function updateImageLocally(Request $request, $id)
  {
    $user = Auth::user();
    $person = Person::findOrFail($id);

    if (checkHierarchy($user, $person)){
      if ($request->hasFile('image')) {
        saveImage($id, 'people', 'input');
      }

      return redirect()->route('panel.people.show', [$id, '#image-section']);
    }
    else {
      return view('errors.401');
    }
  }

  public function storeComment(CommentRequest $request, $id)
  {
    $user = Auth::user();
    $person = Person::findOrFail($id);

    if (checkHierarchy($user, $person)){
      $comment = new Comment();
      $comment->person_id = $id;
      $comment->user_id = $user->id;
      $comment->description = $request->description;
      $comment->save();

      return redirect()->route('panel.people.show', [$id, '#tracking-section']);
    }
    else {
      return view('errors.401');
    }
  }

  public function updateComment(EditCommentRequest $request, $id)
  {
    $user = Auth::user();
    $person = Person::findOrFail($id);

    if (checkHierarchy($user, $person)){
      $comment = Comment::findOrFail($request->edit_comment_id);
      $comment->person_id = $id;
      $comment->user_id = $user->id;
      $comment->description = $request->edit_comment_description;
      $comment->save();

      return redirect()->route('panel.people.show', [$id, '#tracking-section']);
    }
    else {
      return view('errors.401');
    }
  }

  public function destroyComment($id)
  {
    $comment = Comment::findOrFail($id);
    $user = Auth::user();
    $person = Person::findOrFail($comment->person->id);

    if (checkHierarchy($user, $person)){
      $comment->delete();

      return redirect()->route('panel.people.show', [$person->id, '#tracking-section']);
    }
    else {
      return view('errors.401');
    }
  }

  public function location($id)
  {
    $user = Auth::user();
    $person = Person::findOrFail($id);

    if (checkHierarchy($user, $person)){
      return view('panel.people.edit-location', compact('person', 'user'));
    }
    else {
      return view('errors.401');
    }
  }

  public function storeLocation(LocationRequest $request, $id)
  {
    $user = Auth::user();
    $person = Person::findOrFail($id);

    if (checkHierarchy($user, $person)){
      $person->update($request->all());

      return redirect()->route('panel.people.show', [$id]);
    }
    else {
      return view('errors.401');
    }
  }
}
