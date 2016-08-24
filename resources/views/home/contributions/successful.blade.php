@extends ('layouts.home')

@section ('content')
<div class="ui container center" id="successful-contribution-container">
  <h1>{{ trans('home.successful_contribution') }}</h1>
  <h2 class="ui green header">{{ trans('home.successful_contribution_messages.1') }}</h2>
  <h2>{{ trans('home.successful_contribution_messages.2') }}</h2>
  <a class="ui green button" id="continue-seeing-btn" href="{{ route('home.people.show', $person->id) }}">
    {{ trans('home.successful_contribution_messages.3', ['name' => getName($person)]) }}
  </a>
</div>
@endsection