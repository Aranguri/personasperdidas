@extends ('layouts.panel')

@section ('content')
<div class="container">
  <h2>{{ trans('forms.name') }}</h2>
  <h4>{{ $user->name }}</h4>
  <div class="divider"></div>

  <h2>{{ trans('forms.email') }}</h2>
  <h4>{{ $user->email }}</h4>
  <div class="divider"></div>

  @if ($user->hierarchy == 2)
    <h2>{{ trans('panel.country') }}</h2>
    <a href="{{ route('panel.countries.edit', $user->country->id) }}"><h4>{{ $user->country->name }}</h4></a>
    <div class="divider"></div>
  @endif

  @if ($user->hierarchy == 3)
    <h2>{{ trans('panel.province') }}</h2>
    <a href="{{ route('panel.provinces.edit', $user->province->id) }}"><h4>{{ $user->province->name }}</h4></a>
    <div class="divider"></div>
  @endif

  <h2>{{ trans('forms.hierarchy') }}</h2>
  <h4>{{ hierarchyToText($user->hierarchy) }}</h4>
  <div class="divider"></div>

  <h2>{{ trans('panel.actions') }}</h2>
  <a href="{{ route('panel.users.index') }}" class="btn btn-primary">
    <i class="material-icons">arrow_back</i>
    {{ trans('panel.users') }}
  </a>
  <a href="{{ route('panel.users.edit', $user->id) }}" class="btn btn-success">
    <i class="material-icons">edit</i>
    {{ trans('panel.edit') }}
  </a>
  <a href="{{ route('panel.users.password.edit', $user->id) }}" class="btn btn-info">
    <i class="material-icons">lock</i>
    {{ trans('panel.change_password') }}
  </a>
  {!! Form::open(['route' => ['panel.users.destroy', $user->id], 'method' => 'delete', 'class' => 'inline-form', 'onsubmit' => 'return confirmAction("'.trans('panel.sure_delete').'")']) !!}
    <button class="btn btn-danger" type="submit">
      <i class="material-icons">delete</i>
      {{ trans('panel.delete') }}
    </button>
  {!! Form::close() !!}
@endsection