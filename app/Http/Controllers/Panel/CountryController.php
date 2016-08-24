<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Panel\CountryRequest;
use App\Http\Controllers\Controller;

use App\Country;

class CountryController extends Controller
{
  public function __construct()
  {
    $this->middleware('generalAccess');
  }

  public function index()
  {
    $countries = Country::orderBy('name')->paginate(20);
    $are_deleted_registers = !Country::onlyTrashed()->get()->isEmpty();

    return view('panel.countries.index', compact('countries', 'are_deleted_registers'));
  }

  public function show($id)
  {
    $country = Country::findOrFail($id);

    return view('panel.countries.show', compact('country'));
  }

  public function create()
  {
    return view('panel.countries.create');
  }

  public function store(CountryRequest $request)
  {
    $country = Country::create($request->all());

    return redirect()->route('panel.countries.show', [$country->id]);
  }

  public function edit($id)
  {
    $country = Country::findOrFail($id);

    return view('panel.countries.edit', compact('country'));
  }

  public function update(CountryRequest $request, $id)
  {
    $country = Country::findOrFail($id);
    $country->update($request->all());

    return redirect()->route('panel.countries.show', [$id]);
  }

  public function destroy($id)
  {
    $country = Country::findOrFail($id);
    $country->delete();

    return redirect()->route('panel.countries.index');
	}
}
