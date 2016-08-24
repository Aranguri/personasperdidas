<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

use App\Person;
use App\Reporter;
use App\Province;
use App\Country;
use App\Subscriber;
use App\Contribution;
use App\Contributor;

use Carbon\Carbon;

class PanelController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    return view('panel.index');
  }
}
