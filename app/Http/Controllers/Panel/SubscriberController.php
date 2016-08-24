<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Panel\SubscriberRequest;
use App\Http\Controllers\Controller;

use App\Subscriber;

class SubscriberController extends Controller
{
  public function __construct()
  {
    $this->middleware('generalAccess');
  }

  public function index()
  {
    $subscribers = Subscriber::latest()->paginate(20);
    $are_deleted_registers = !Subscriber::onlyTrashed()->get()->isEmpty();

    return view('panel.subscribers.index', compact('subscribers', 'are_deleted_registers'));
  }

  public function show($id)
  {
    $subscriber = Subscriber::findOrFail($id);

    return view('panel.subscribers.show', compact('subscriber'));
  }

  public function create()
  {
    return view('panel.subscribers.create');
  }

  public function store(SubscriberRequest $request)
  {
    $subscriber = Subscriber::create($request->all());

    return redirect()->route('panel.subscribers.show', [$subscriber->id]);
  }

  public function edit($id)
  {
    $subscriber = Subscriber::findOrFail($id);

    return view('panel.subscribers.edit', compact('subscriber'));
  }

  public function update(SubscriberRequest $request, $id)
  {
    $subscriber = Subscriber::findOrFail($id);
    $subscriber->update($request->all());

    return redirect()->route('panel.subscribers.show', [$id]);
  }

  public function destroy($id)
  {
    $subscriber = Subscriber::findOrFail($id);
    $subscriber->delete();

    return redirect()->route('panel.subscribers.index');
	}
}
