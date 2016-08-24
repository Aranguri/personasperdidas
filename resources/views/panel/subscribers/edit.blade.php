@extends ('layouts.panel')

@section ('content')
<div class="container">
  @include ('errors.list')

  {!! Form::model($subscriber, ['method' => 'PATCH', 'action' => ['Panel\SubscriberController@update', $subscriber->id]]) !!}
    @include ('panel.subscribers._form', ['submitButtonIcon' => 'save', 'submitButtonText' => trans('forms.save')])
  {!! Form::close() !!}
</div>
@endsection