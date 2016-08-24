@extends ('layouts.panel')

@section ('content')
<div class="container">
  @include ('errors.list')

  {!! Form::open(['route' => 'panel.subscribers.store']) !!}
    @include ('panel.subscribers._form', ['submitButtonIcon' => 'add', 'submitButtonText' => trans('forms.add')])
  {!! Form::close() !!}
</div>
@endsection