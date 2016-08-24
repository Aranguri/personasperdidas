@extends ('layouts.home')

@section ('content')
<div class="ui container" id="suggestion-container">
  <h1>{{ trans('home.suggestion_title') }}</h1>
  <h3 class="error-message" id="error-message"></h3>

  {!! Form::open(['route' => 'home.suggestions.store', 'class' => 'ui form', 'id' => 'suggestion-form']) !!}
    <div class="field">
      {!! Form::label('email', trans('forms.email')) !!}
      {!! Form::text('email') !!}
    </div>

    <div class="field">
      {!! Form::label('description', trans('forms.description')) !!}
      {!! Form::textarea('description') !!}
    </div>

    <div class="center">
      <a class="ui large blue button" href="#" onclick="sendSuggestion('{{ trans('forms.email_error_message') }}', '{{ trans('forms.description_error_message') }}')">
        {{ trans('forms.send') }}
      </a>
    </div>
  {!! Form::close() !!}
</div>
@endsection