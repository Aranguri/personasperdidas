<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Panel\ContributionRequest;
use App\Http\Controllers\Controller;

use App\Contribution;
use App\Contributor;
use App\Country;
use App\Province;

use Auth;
use Image;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class ContributionController extends Controller
{
  public function __construct()
  {
    $this->middleware('generalAccess');
  }

  public function show($id)
  {
    $contribution = Contribution::findOrFail($id);
    $contribution['found_at'] = Carbon::parse($contribution->found_at)->format(config('app.date_format'));

    return view('panel.contributions.show', compact('contribution'));
  }

  public function edit($id)
  {
    $contribution = Contribution::findOrFail($id);
    $contribution['found_at'] = Carbon::parse($contribution->found_at)->format(config('app.date_format'));
    $contributor = $contribution->contributor;

    $countries = Country::lists('name', 'id');
    $provinces = Province::lists('name', 'id');
    $provinces_for_each_country = provincesForEachCountry(Country::get());

    return view('panel.contributions.edit', compact('contribution', 'contributor', 'countries', 'provinces', 'provinces_for_each_country'));
  }

  public function update(ContributionRequest $request, $id)
  {
    $contribution = Contribution::findOrFail($id);
    $request['found_at'] = Carbon::createFromFormat(config('app.date_format'), $request->found_at)->toDateString();
    $contribution->update($request->except('contributor', 'country_id'));

    $contributor = $contribution->contributor;
    $contributor->update($request->only('contributor')['contributor']);

    return redirect()->route('panel.people.contributions.show', [$id]);
  }

  public function destroy($id)
  {
    $contribution = Contribution::findOrFail($id);
    $contribution->delete();

    return redirect()->route('panel.people.index');
	}

  public function updateImageLocally(Request $request, $id)
  {
    $user = Auth::user();
    $contribution = Contribution::findOrFail($id);
    $person = $contribution->person;

    if (checkHierarchy($user, $person)) {
      if ($request->hasFile('image')) {
        $image = Image::make(Input::file('image'));
        $image->resize(512, null, function ($constraint) {
          $constraint->aspectRatio();
        });
      	$image->save('images/contributions/' . $id . '.jpg');
      }
      return redirect()->route('panel.people.contributions.show', [$id, '#image-section']);
    }
    else {
      return view('errors.401');
    }
  }
}
