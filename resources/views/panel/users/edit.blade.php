@extends ('layouts.panel')

@section ('content')
<div class="container">
  @include ('errors.list')

  {!! Form::model($user, ['method' => 'PATCH', 'action' => ['Panel\UserController@update', $user->id]]) !!}
    @include ('panel.users._form', ['create' => false, 'submitButtonIcon' => 'save', 'submitButtonText' => trans('forms.save')])
  {!! Form::close() !!}
</div>
@endsection

@section ('scripts')
<script>changeUsersHierarchySelect('{{ getenv("LOCATION_MODE") }}')</script>
@endsection