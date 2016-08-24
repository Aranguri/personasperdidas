<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Panel\ContactDetailRequest;
use App\Http\Controllers\Controller;

use App\ContactDetail;

class ContactDetailController extends Controller
{
  public function __construct()
  {
    $this->middleware('generalAccess');
  }

  public function index()
  {
    $contactDetail = ContactDetail::first();

    return view('panel.contact-details.index', compact('contactDetail'));
  }

  public function create()
  {
    if (ContactDetail::first()) {
      return redirect()->route('panel.contact-details.index');
    }
    else {
      return view('panel.contact-details.create');
    }
  }

  public function store(ContactDetailRequest $request)
  {
    $contactDetail = ContactDetail::create($request->except('same_email'));

    return redirect()->route('panel.contact-details.index');
  }

  public function edit($id)
  {
    $contactDetail = ContactDetail::findOrFail($id);

    return view('panel.contact-details.edit', compact('contactDetail'));
  }

  public function update(ContactDetailRequest $request, $id)
  {
    $contactDetail = ContactDetail::findOrFail($id);
    $contactDetail->update($request->except('same_email'));

    return redirect()->route('panel.contact-details.index');
  }
}
