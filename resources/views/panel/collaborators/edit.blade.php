@extends ('layouts.panel')

@section ('content')
<div class="container">
  @include ('errors.list')

  {!! Form::model($collaborator, ['method' => 'PATCH', 'action' => ['Panel\CollaboratorController@update', $collaborator->id]]) !!}
    @include ('panel.collaborators._form', ['submitButtonIcon' => 'save', 'submitButtonText' => trans('forms.save')])
  {!! Form::close() !!}
</div>
@endsection