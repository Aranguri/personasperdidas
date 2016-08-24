@extends ('layouts.panel')

@section ('content')
<div class="container">
  @include ('errors.list')

  {!! Form::open(['route' => 'panel.collaborators.store']) !!}
    @include ('panel.collaborators._form', ['submitButtonIcon' => 'add', 'submitButtonText' => trans('forms.add')])
  {!! Form::close() !!}
</div>
@endsection