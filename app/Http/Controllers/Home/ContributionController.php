<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Home\ContributionRequest;
use App\Http\Controllers\Controller;

use App\Contribution;
use App\Contributor;
use App\ContactDetail;
use App\Person;
use App\Country;
use App\Province;
use Carbon\Carbon;
use Mail;

class ContributionController extends Controller
{
  public function create($id)
  {
    $person = Person::findOrFail($id);

    $countries = Country::lists('name', 'id');
    $provinces = Province::has('country')->lists('name', 'id');
    $provinces_for_each_country = provincesForEachCountry(Country::get());

    $years = getYears();
    $months = getMonths();

    return view('home.contributions.create', compact('countries', 'provinces', 'provinces_for_each_country', 'years', 'months', 'person'));
  }

  public function store(ContributionRequest $request, $id)
  {
    $request['found_at'] = dateFromSplit($request->year, $request->month, $request->day);
    $request['person_id'] = $id;

    $contribution = Contribution::create($request->except(['year', 'month', 'day', 'image', 'country_id', 'contributor']));

    if ($request->hasFile('image')) {
      saveImage($contribution->id, 'contributions', 'input');
    }
    $contributor_request = $request->only(['contributor'])['contributor'];
    $contributor_request['contribution_id'] = $contribution->id;
    $contributor = Contributor::create($contributor_request);

    $email = ContactDetail::first()->private_email;

    Mail::send('emails.contributions', ['contribution' => $contribution, 'person' => $contribution->person], function ($m) use ($user) {
      $m->from('hello@app.com', 'Your Application');
      $m->to($user->email, $user->name)->subject('Your Reminder!');
    });

    return redirect()->route('home.people.contributions.create.successful', $id);
  }

  public function successfulCreate($id)
  {
    $person = Person::findOrFail($id);

    return view('home.contributions.successful', compact('person'));
  }
}
