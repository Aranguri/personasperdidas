@extends ('layouts.panel')

@section ('content')
<div class="container">
  @if ($suggestion->email)
    <h2>{{ trans('forms.email') }}</h2>
    <h4>{{ $suggestion->email }}</h4>
    <div class="divider"></div>
  @endif

  <h2>{{ trans('forms.description') }}</h2>
  <h4>{{ $suggestion->description }}</h4>
  <div class="divider"></div>

  <h2>{{ trans('panel.actions') }}</h2>
  <a href="{{ route('panel.suggestions.index') }}" class="btn btn-primary">
    <i class="material-icons">arrow_back</i>
    {{ trans('panel.suggestions') }}
  </a>
  <a href="{{ route('panel.suggestions.edit', $suggestion->id) }}" class="btn btn-success">
    <i class="material-icons">edit</i>
    {{ trans('panel.edit') }}
  </a>
  {!! Form::open(['route' => ['panel.suggestions.destroy', $suggestion->id], 'method' => 'delete', 'class' => 'inline-form', 'onsubmit' => 'return confirmAction("'.trans('panel.sure_delete').'")']) !!}
    <button class="btn btn-danger" type="submit">
      <i class="material-icons">delete</i>
      {{ trans('panel.delete') }}
    </button>
  {!! Form::close() !!}
@endsection