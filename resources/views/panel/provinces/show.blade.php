@extends ('layouts.panel')

@section ('content')
<div class="container">
  <h2>{{ trans('forms.name') }}</h2>
  <h4>{{ $province->name }}</h4>
  <div class="divider"></div>

  @if (getenv('LOCATION_MODE') == 'countries')
    <h2>{{ trans('panel.country') }}</h2>
    <a href="{{ route('panel.countries.show', $province->country->id) }}"><h4>{{ $province->country->name }}</h4></a>
    <div class="divider"></div>
  @endif

  @if ($province->users->count() > 0)
    <h2>{{ trans('panel.users') }}</h2>
    @foreach ($province->users as $user)
      <a href="{{ route('panel.users.show', $user->id) }}"><h4>{{ $user->name }}</h4></a>
    @endforeach
    <div class="divider"></div>
  @endif

  <h2>{{ trans('panel.actions') }}</h2>
  <a href="{{ route('panel.provinces.index') }}" class="btn btn-primary">
    <i class="material-icons">arrow_back</i>
    {{ trans('panel.provinces') }}
  </a>
  <a href="{{ route('panel.provinces.edit', $province->id) }}" class="btn btn-success">
    <i class="material-icons">edit</i>
    {{ trans('panel.edit') }}
  </a>
  {!! Form::open(['route' => ['panel.provinces.destroy', $province->id], 'method' => 'delete', 'class' => 'inline-form', 'onsubmit' => 'return confirmAction("'.trans('panel.sure_delete').'")']) !!}
    <button class="btn btn-danger" type="submit">
      <i class="material-icons">delete</i>
      {{ trans('panel.delete') }}
    </button>
  {!! Form::close() !!}
@endsection