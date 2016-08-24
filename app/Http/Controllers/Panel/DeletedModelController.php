<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Person;

class DeletedModelController extends Controller
{
  public function index($model)
  {
    $model_in_plural = $model;
    $model = makeModelSingular($model);
    $class = makeClassFromModel($model);
    $registers = $class->onlyTrashed()->orderBy('deleted_at')->paginate(20);

    return view('panel.deleted.index', compact('registers', 'model', 'model_in_plural'));
  }

  public function peopleIndex($status)
  {
    $model_in_plural = 'people';
    $model = makeModelSingular($model_in_plural);
    $registers = Person::where('status', $status)->onlyTrashed()->orderBy('deleted_at')->paginate(20);

    return view('panel.deleted.index', compact('registers', 'model', 'model_in_plural', 'status'));
  }

  public function show($model, $id)
  {
    $model_in_plural = $model;
    $model = makeModelSingular($model);
    $class = makeClassFromModel($model);
    $register = $class->onlyTrashed()->findOrFail($id);

    return view('panel.deleted.show', compact('register', 'model', 'model_in_plural'));
  }

  public function restore($model, $id)
  {
    $model_in_plural = $model;
    $model = makeModelSingular($model);
    $class = makeClassFromModel($model);
    $class->onlyTrashed()->findOrFail($id)->restore();

    return redirect()->route('panel.' . $model_in_plural . '.show', $id);
  }

  public function permanentlyDelete($model, $id, $status = null)
  {
    $model_in_plural = $model;
    $model = makeModelSingular($model);
    $class = makeClassFromModel($model);
    $register = $class->onlyTrashed()->findOrFail($id);
    $register_id = $register->id;
    $register->forceDelete();

    if ($model == 'Person') {
      deleteImages($register_id, 'people');
      return redirect()->route('panel.deleted.people.index', compact('status'));
    }
    else {
      return redirect()->route('panel.deleted.index', compact('model'));
    }
  }
}
