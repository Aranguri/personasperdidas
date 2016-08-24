@extends ('layouts.panel')

@section ('content')
<div class="container">
  <h2>{{ trans('forms.name') }}</h2>
  <h4>{{ $collaborator->name }}</h4>
  <div class="divider"></div>

  @if ($collaborator->web)
    <h2>{{ trans('forms.web') }}</h2>
    <h4><a href="{{ $collaborator->web }}" target="_blank">{{ $collaborator->web }}</a></h4>
    <div class="divider"></div>
  @endif

  <h2>{{ trans('panel.actions') }}</h2>
  <a href="{{ route('panel.collaborators.index') }}" class="btn btn-primary">
    <i class="material-icons">arrow_back</i>
    {{ trans('panel.collaborators') }}
  </a>
  <a href="{{ route('panel.collaborators.edit', $collaborator->id) }}" class="btn btn-success">
    <i class="material-icons">edit</i>
    {{ trans('panel.edit') }}
  </a>
  {!! Form::open(['route' => ['panel.collaborators.destroy', $collaborator->id], 'method' => 'delete', 'class' => 'inline-form', 'onsubmit' => 'return confirmAction("'.trans('panel.sure_delete').'")']) !!}
  <button class="btn btn-danger" type="submit">
    <i class="material-icons">delete</i>
    {{ trans('panel.delete') }}
  </button>
  {!! Form::close() !!}
</div>
@endsection