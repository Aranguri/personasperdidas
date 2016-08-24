@extends ('layouts.home')

@section ('content')
<div class="ui container center" id="status-container">
  <h1>{{ trans('home.status_title') }}</h1>
  <div class="field" id="select-status">
    <a class="ui large blue button" href="{{ route('home.people.create', 'missing') }}">
      {{ trans('forms.missing') }}
    </a>
    <a class="ui large green button" href="{{ route('home.people.create', 'found') }}">
      {{ trans('forms.found') }}
    </a>
  </div>
</div>
@endsection