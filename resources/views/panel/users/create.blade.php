@extends ('layouts.panel')

@section ('content')
<div class="container">
  @include ('errors.list')

  {!! Form::open(['route' => 'panel.users.store']) !!}
    @include ('panel.users._form', ['create' => true, 'submitButtonIcon' => 'add', 'submitButtonText' => trans('forms.add')])
  {!! Form::close() !!}
</div>
@endsection

@section ('scripts')
<script>changeUsersHierarchySelect('{{ getenv("LOCATION_MODE") }}')</script>
@endsection