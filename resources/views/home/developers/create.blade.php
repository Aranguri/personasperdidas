@extends ('layouts.home')

@section ('content')
<div class="ui container center" id="developers-container">
  <h1>{{ trans('home.developers_title') }}</h1>
  <h3>{{ trans('home.developers_subtitle')}}</h3>
  <h3 class="error-message" id="error-message"></h3>

  {!! Form::open(['route' => 'home.developers.store', 'class' => 'ui form', 'id' => 'developers-form']) !!}
    <div class="ui large action input">
      {!! Form::text('email', null, ['id' => 'developer-email', 'placeholder' => trans('forms.email')]) !!}
      <button class="ui large blue button" type="submit">
        {{ trans('forms.send') }}
      </button>
    </div>
  {!! Form::close() !!}
</div>
@endsection
