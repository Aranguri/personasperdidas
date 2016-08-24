@extends('layouts.auth')

@section('content')
<div class="container" id="login-container">
  <h3>{{ trans('panel.access_panel') }}</h3>
  {!! Form::open(['route' => 'auth.login', 'class' => 'form-signin']) !!}
    {!! Form::email('email', old('email'), ['class' => 'form-control', 'id' => 'login-email', 'placeholder' => trans('forms.email')]) !!}
    {!! Form::password('password', ['class' => 'form-control', 'id' => 'login-password', 'placeholder' => trans('forms.password')]) !!}
    <div class="checkbox">
      <label>
        <input type="checkbox" name="remember"> {{ trans('forms.remember_me') }}
      </label>
    </div>
    <button type="submit" class="btn btn-lg btn-primary btn-block">
      <i class="fa fa-btn fa-sign-in"></i>
      {{ trans('forms.login') }}
    </button>
    <!-- <a class="btn btn-link" id="login-forgot-password" href="{{ route('auth.password.reset') }}">Forgot Your Password?</a> -->
  {!! Form::close() !!}
</div>
@endsection
