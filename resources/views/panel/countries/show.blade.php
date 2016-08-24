@extends ('layouts.panel')

@section ('content')
<div class="container">
  <h2>{{ trans('forms.name') }}</h2>
  <h4>{{ $country->name }}</h4>
  <div class="divider"></div>

  @if ($country->provinces->count())
    <h2>{{ trans('panel.provinces') }}</h2>
    @foreach ($country->provinces as $province)
      <a href="{{ route('panel.provinces.show', $province->id) }}">
        <h4>{{ $province->name }}</h4>
      </a>
    @endforeach
    <div class="divider"></div>
  @endif

  @if ($country->users->count() > 0)
    <h2>{{ trans('panel.users') }}</h2>
    @foreach ($country->users as $user)
      <a href="{{ route('panel.users.show', $user->id) }}">
        <h4>{{ $user->name }}</h4>
      </a>
    @endforeach
    <div class="divider"></div>
  @endif

  <h2>{{ trans('panel.actions') }}</h2>
  <a href="{{ route('panel.countries.index') }}" class="btn btn-primary">
    <i class="material-icons">arrow_back</i>
    {{ trans('panel.countries') }}
  </a>
  <a href="{{ route('panel.countries.edit', $country->id) }}" class="btn btn-success">
    <i class="material-icons">edit</i>
    {{ trans('panel.edit') }}
  </a>
  {!! Form::open(['route' => ['panel.countries.destroy', $country->id], 'method' => 'delete', 'class' => 'inline-form', 'onsubmit' => 'return confirmAction("'.trans('panel.sure_delete').'")']) !!}
    <button class="btn btn-danger" type="submit">
      <i class="material-icons">delete</i>
      {{ trans('panel.delete') }}
    </button>
  {!! Form::close() !!}
</div>
@endsection