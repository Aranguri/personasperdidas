<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Panel\CollaboratorRequest;
use App\Http\Controllers\Controller;

use App\Collaborator;

class CollaboratorController extends Controller
{
  public function __construct()
  {
    $this->middleware('generalAccess');
  }

  public function index()
  {
    $collaborators = Collaborator::orderBy('name')->paginate(20);
    $are_deleted_registers = !Collaborator::onlyTrashed()->get()->isEmpty();

    return view('panel.collaborators.index', compact('collaborators', 'are_deleted_registers'));
  }

  public function show($id)
  {
    $collaborator = Collaborator::findOrFail($id);

    return view('panel.collaborators.show', compact('collaborator'));
  }

  public function create()
  {
    return view('panel.collaborators.create');
  }

  public function store(CollaboratorRequest $request)
  {
    $collaborator = Collaborator::create($request->all());

    return redirect()->route('panel.collaborators.show', [$collaborator->id]);
  }

  public function edit($id)
  {
    $collaborator = Collaborator::findOrFail($id);

    return view('panel.collaborators.edit', compact('collaborator'));
  }

  public function update(CollaboratorRequest $request, $id)
  {
    $collaborator = Collaborator::findOrFail($id);
    $collaborator->update($request->all());

    return redirect()->route('panel.collaborators.show', [$id]);
  }

  public function destroy($id)
  {
    $collaborator = Collaborator::findOrFail($id);
    $collaborator->delete();

    return redirect()->route('panel.collaborators.index');
	}
}
