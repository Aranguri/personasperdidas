@extends ('layouts.panel')

@section ('content')
<div class="container">
  @include ('errors.list')

  {!! Form::open(['route' => 'panel.contact-details.store']) !!}
    @include ('panel.contact-details._form', ['submitButtonIcon' => 'add', 'submitButtonText' => trans('forms.add')])
  {!! Form::close() !!}
</div>
@endsection