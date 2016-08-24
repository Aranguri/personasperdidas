@extends ('layouts.panel')

@section ('content')
<div class="container">
  @include ('errors.list')

  {!! Form::model($contactDetail, ['method' => 'PATCH', 'action' => ['Panel\ContactDetailController@update', $contactDetail->id]]) !!}
    @include ('panel.contact-details._form', ['submitButtonIcon' => 'save', 'submitButtonText' => trans('forms.save')])
  {!! Form::close() !!}
</div>
@endsection