<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Home\SuggestionRequest;
use App\Http\Controllers\Controller;
use App\Suggestion;

class SuggestionController extends Controller
{
  public function create()
  {
    return view('home.suggestions.create');
  }

  public function store(SuggestionRequest $request)
  {
    $suggestion = Suggestion::create($request->all());

    return redirect()->route('home.suggestions.successful');
  }

  public function successful()
  {
    return view('home.suggestions.successful');
  }
}
