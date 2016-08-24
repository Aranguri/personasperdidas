@extends ('layouts.panel')

@section ('content')
<div class="container">
  <h2>{{ trans('forms.email') }}</h2>
  <h4>{{ $subscriber->email }}</h4>
  <div class="divider"></div>

  <h2>{{ trans('panel.actions') }}</h2>
  <a href="{{ route('panel.subscribers.index') }}" class="btn btn-primary">
    <i class="material-icons">arrow_back</i>
    {{ trans('panel.subscribers') }}
  </a>
  <a href="{{ route('panel.subscribers.edit', $subscriber->id) }}" class="btn btn-success">
    <i class="material-icons">edit</i>
    {{ trans('panel.edit') }}
  </a>
  {!! Form::open(['route' => ['panel.subscribers.destroy', $subscriber->id], 'method' => 'delete', 'class' => 'inline-form', 'onsubmit' => 'return confirmAction("'.trans('panel.sure_delete').'")']) !!}
    <button class="btn btn-danger" type="submit">
      <i class="material-icons">delete</i>
      {{ trans('panel.delete') }}
    </button>
  {!! Form::close() !!}
@endsection