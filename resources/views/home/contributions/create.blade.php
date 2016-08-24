@extends ('layouts.home')

@section ('content')
<div class="ui container center">
  <h1>{{ trans('home.contributions_title', ['name' => getName($person)]) }}</h1>
  <h3 class="error-message" id="error-message"></h3>

  {!! Form::open(['route' => ['home.people.contributions.store', $person->id], 'class' => 'ui form large-form', 'id' => 'contribution-form', 'files' => true]) !!}
    @include ('home.contributions._form')
  {!! Form::close() !!}
</div>
@endsection