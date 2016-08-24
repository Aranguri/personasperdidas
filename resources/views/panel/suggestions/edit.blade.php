@extends ('layouts.panel')

@section ('content')
<div class="container">
  @include ('errors.list')

  {!! Form::model($suggestion, ['method' => 'PATCH', 'action' => ['Panel\SuggestionController@update', $suggestion->id]]) !!}
    @include ('panel.suggestions._form', ['submitButtonIcon' => 'save', 'submitButtonText' => trans('forms.save')])
  {!! Form::close() !!}
</div>
@endsection