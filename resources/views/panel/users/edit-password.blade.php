@extends ('layouts.panel')

@section ('content')
<div class="container">
  @include ('errors.list')

  {!! Form::model($user, ['action' => ['Panel\UserController@updatePassword', $user->id]]) !!}
    <div class="form-group">
      {!! Form::label('password', trans('forms.password')) !!}
      {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('password_confirmation', trans('forms.password_confirmation')) !!}
      {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    </div>

    <a href="{{ route('panel.users.index') }}" class="btn btn-primary">
      <i class="material-icons">arrow_back</i>
      {{ trans('panel.users') }}
    </a>

    <button type="submit" class="btn btn-success">
      <i class="material-icons">save</i>
      {{ trans('forms.save') }}
    </button>
  {!! Form::close() !!}
</div>
@endsection