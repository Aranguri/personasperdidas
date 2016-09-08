<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Home\PersonRequest;
use App\Http\Controllers\Controller;

use App\Person;
use App\Reporter;
use App\Province;
use App\Country;
use Carbon\Carbon;

class PersonController extends Controller
{
  public function index($status = null)
  {
    $status = statusFromUrlParameter($status);

    $people = Person::where('status', $status)->orderBy('created_at', 'desc')->paginate(24);

    return view('home.people.index', compact('people', 'status'));
  }

  public function show($id)
  {
    $id = explode('-', $id)[0];
    $person = Person::findOrFail($id);
    $person->birth_year = Carbon::today()->year - $person->birth_year;
    $person['missing_at'] = convertFromCarbonDate($person->missing_at);
    $person['found_at'] = convertFromCarbonDate($person->found_at);
    $person['closure_at'] = convertFromCarbonDate($person->closure_at);

    return view('home.people.show', compact('person'));
  }

  public function showForPrint($id)
  {
    $id = explode('-', $id)[0];
    $person = Person::findOrFail($id);
    $person->birth_year = Carbon::today()->year - $person->birth_year;
    $person['missing_at'] = convertFromCarbonDate($person->missing_at);
    $person['found_at'] = convertFromCarbonDate($person->found_at);
    $person['closure_at'] = convertFromCarbonDate($person->closure_at);

    return view('home.people.show-for-print', compact('person'));
  }

  public function create($status = null)
  {
    if ($status){
      $countries = Country::lists('name', 'id');
      $provinces = Province::lists('name', 'id');
      $provinces_for_each_country = provincesForEachCountry(Country::get());

      $years = getYears();
      $months = getMonths();

      return view('home.people.create.index', compact('countries', 'provinces', 'provinces_for_each_country', 'years', 'months', 'status'));
    }
    else {
      return view('home.people.create.status');
    }
  }

  public function store(PersonRequest $request, $status)
  {
    $request['status'] = $status . '_to_validate';
    $request['birth_year'] = Carbon::today()->year - $request->birth_year;
    if ($status == 'missing') {
      $request['missing_at'] = Carbon::create($request->year, $request->month, $request->day);
    }
    else {
      $request['found_at'] = Carbon::create($request->year, $request->month, $request->day);
    }

    $person = Person::create($request->except(['reporter', 'country_id', 'image', 'year', 'month', 'day', 'has_disease']));

    if ($request->hasFile('image')) {
      saveImage($person->id, 'people', 'input');
    }

    $reporter_request = $request->only(['reporter'])['reporter'];
    $reporter_request['person_id'] = $person->id;
    $reporter = Reporter::create($reporter_request);

    return redirect()->route('home.people.create.successful', $status);
  }

  public function successfulCreate($status)
  {
    return view('home.people.create.successful', compact('status'));
  }
}
