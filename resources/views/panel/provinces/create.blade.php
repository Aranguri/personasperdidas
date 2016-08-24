@extends ('layouts.panel')

@section ('content')
<div class="container">
  @include ('errors.list')

  {!! Form::open(['route' => 'panel.provinces.store']) !!}
    @include ('panel.provinces._form', ['submitButtonIcon' => 'add', 'submitButtonText' => trans('forms.add')])
  {!! Form::close() !!}
</div>
@endsection