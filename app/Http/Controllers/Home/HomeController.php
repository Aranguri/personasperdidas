<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Home\SubscriberRequest;
use App\Http\Requests\Home\SuggestionRequest;
use App\Http\Controllers\Controller;
use Mail;
use App\Collaborator;
use App\Person;

class HomeController extends Controller
{
  public function collaborators()
  {
    if (!Collaborator::get()->isEmpty()) {
      $collaborators = Collaborator::orderBy('name')->get();

      return view('home.footer.collaborators', compact('collaborators'));
    }
    else {
      return view('errors.404');
    }
  }

  public function privacy()
  {
    return view('home.footer.privacy');
  }

  public function terms()
  {
    return view('home.footer.terms');
  }

  public function recommendations()
  {
    return view('home.others.recommendations');
  }

  public function map()
  {
    return view('home.others.map');
  }

  public function email()
  {
    $person = Person::findOrFail(1);

    Mail::send('home.suggestions.successful', ['person' => $person], function ($m) use ($person) {
      $m->from('hello@app.com', 'Your Application');

      $m->to('santiago.aranguri@gmail.com', $person->name)->subject('Your Reminder!');
    });
  }
}
