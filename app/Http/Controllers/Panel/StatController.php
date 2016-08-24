<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Person;
use App\Country;
use App\Province;
use App\User;
use App\Subscriber;
use App\Suggestion;
use App\Collaborator;
use App\Contribution;
use App\Comment;

class StatController extends Controller
{
  public function __construct()
  {
    $this->middleware('generalAccess');
  }

  public function index()
  {
    $people = Person::get();
    $countries = Country::get();
    $provinces = Province::get();
    $users = User::get();
    $subscribers = Subscriber::get();
    $suggestions = Suggestion::get();
    $collaborators = Collaborator::get();
    $contributions = Contribution::get();
    $comments = Comment::get();

    return view('panel.stats.index', compact('people', 'countries', 'provinces', 'users', 'subscribers', 'suggestions', 'collaborators', 'contributions', 'comments'));
  }
}
