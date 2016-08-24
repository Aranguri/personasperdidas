<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Home\SubscriberRequest;
use App\Http\Controllers\Controller;
use App\Subscriber;
use Validator;

class SubscriberController extends Controller
{
  public function subscribe($email = null)
  {
    return view('home.subscribers.subscribe', compact('email'));
  }

  public function store(SubscriberRequest $request)
  {
    Subscriber::create($request->all());

    return redirect()->route('home.subscribers.subscribe.successful');
  }

  public function footerStore(Request $request)
  {
    $request['email'] = $request->footer_email;
    $validator = Validator::make($request->all(), [
      'email' => 'required|email|unique:subscribers',
    ]);

    if ($validator->fails()) {
      return redirect()->route('home.subscribers.subscribe', $request->email)->withErrors($validator);
    }

    Subscriber::create($request->except('footer_email'));

    return redirect()->route('home.subscribers.subscribe.successful');
  }

  public function successfulSubscribe()
  {
    return view('home.subscribers.successful-subscribe');
  }

  public function unsubscribe($email = null)
  {
    return view('home.subscribers.unsubscribe', compact('email'));
  }

  public function destroy(Request $request)
  {
    $subscriber = Subscriber::where('email', $request->email)->first();
    $subscriber->delete();

    return redirect()->route('home.subscribers.unsubscribe.successful');
  }

  public function successfulUnsubscribe()
  {
    return view('home.subscribers.successful-unsubscribe');
  }

}
