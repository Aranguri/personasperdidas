<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DeveloperController extends Controller
{
  public function create()
  {
    return view('home.developers.create');
  }

  public function store()
  {
    return view('home.developers.create');
  }

  public function successul()
  {
    return view('home.developers.successful');
  }
}
