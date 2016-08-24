<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Panel\StoreUserRequest;
use App\Http\Requests\Panel\UpdateUserRequest;
use App\Http\Requests\Panel\UserPasswordRequest;
use App\Http\Controllers\Controller;

use App\User;
use App\Country;
use App\Province;

class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware('generalAccess');
  }

  public function index()
  {
    $users = User::where('hierarchy', '=', 0)
      ->orWhere(function ($query) {
        $query->where('hierarchy', '=', 2)
              ->has('country');
      })
      ->orWhere(function ($query) {
        $query->where('hierarchy', '=', 3)
              ->has('province');
      })
      ->orderBy('name')->paginate(20);
    $are_deleted_registers = !User::onlyTrashed()->get()->isEmpty();

    return view('panel.users.index', compact('users', 'are_deleted_registers'));
  }

  public function show($id)
  {
    $user = User::findOrFail($id);

    return view('panel.users.show', compact('user'));
  }

  public function create()
  {
    $countries = Country::lists('name', 'id');
    $provinces = Province::lists('name', 'id');

    $provinces_for_each_country = provincesForEachCountry(Country::get());

    return view('panel.users.create', compact('countries', 'provinces', 'provinces_for_each_country'));
  }

  public function store(StoreUserRequest $request)
  {
    if ($request->hierarchy == 2){
      $request->province_id = NULL;
    } else if ($request->hierarchy == 3) {
      $request->country_id = NULL;
    } else {
      $request->country_id = NULL;
      $request->province_id = NULL;
    }

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => bcrypt($request->password),
      'hierarchy' => $request->hierarchy,
      'country_id' => $request->country_id,
      'province_id' => $request->province_id,
    ]);

    return redirect()->route('panel.users.show', [$user->id]);
  }

  public function edit($id)
  {
    $user = User::findOrFail($id);
    $countries = Country::lists('name', 'id');
    $provinces = Province::lists('name', 'id');

    $provinces_for_each_country = provincesForEachCountry(Country::get());

    return view('panel.users.edit', compact('user', 'countries', 'provinces', 'provinces_for_each_country'));
  }

  public function update(UpdateUserRequest $request, $id)
  {
    $user = User::findOrFail($id);

    if ($request->hierarchy == 2){
      $request->province_id = NULL;
    } else if ($request->hierarchy == 3) {
      $request->country_id = NULL;
    } else {
      $request->country_id = NULL;
      $request->province_id = NULL;
    }

    $user->update([
      'name' => $request->name,
      'email' => $request->email,
      'hierarchy' => $request->hierarchy,
      'country_id' => $request->country_id,
      'province_id' => $request->province_id,
    ]);

    return redirect()->route('panel.users.show', [$id]);
  }

  public function destroy($id)
  {
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('panel.users.index');
  }

  public function password($id)
  {
    $user = User::findOrFail($id);

    return view('panel.users.edit-password', compact('user'));
  }

  public function updatePassword(UserPasswordRequest $request, $id)
  {
    $user = User::findOrFail($id);
    $user->password = bcrypt($request->password);
    $user->save();

    return redirect()->route('panel.users.show', [$id]);
  }


}
