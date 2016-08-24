<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Panel\ProvinceRequest;
use App\Http\Controllers\Controller;

use App\Country;
use App\Province;

class ProvinceController extends Controller
{
  public function __construct()
  {
    $this->middleware('generalAccess');
  }

  public function index()
  {
    $provinces = Province::has('country')->orderBy('name')->paginate(20);
    $are_deleted_registers = !Province::onlyTrashed()->get()->isEmpty();

    return view('panel.provinces.index', compact('provinces', 'are_deleted_registers'));
  }

  public function show($id)
  {
    $province = Province::has('country')->findOrFail($id);

    return view('panel.provinces.show', compact('province'));
  }

  public function create()
  {
    $countries = Country::lists('name', 'id');

    return view('panel.provinces.create', compact('countries'));
  }

  public function store(ProvinceRequest $request)
  {
    $province = Province::create($request->all());

    return redirect()->route('panel.provinces.show', [$province->id]);
  }

  public function edit($id)
  {
    $province = Province::has('country')->findOrFail($id);
    $countries = Country::lists('name', 'id');

    return view('panel.provinces.edit', compact('province', 'countries'));
  }

  public function update(ProvinceRequest $request, $id)
  {
    $province = Province::has('country')->findOrFail($id);
    $province->update($request->all());

    return redirect()->route('panel.provinces.show', [$id]);
  }

  public function destroy($id)
  {
    $province = Province::has('country')->findOrFail($id);
    $province->delete();

    return redirect()->route('panel.provinces.index');
	}
}
