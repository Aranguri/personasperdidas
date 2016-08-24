@extends('layouts.auth')

@section('content')
<div class="container" id="login-container">
  <h3>{{ trans('panel.reset_password') }}</h3>
  @if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
	@endif
  {!! Form::open(['route' => 'auth.password.email', 'class' => 'form-signin']) !!}
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			<label class="col-md-4 control-label">E-Mail Address</label>
			<div class="col-md-6">
				<input type="email" class="form-control" name="email" value="{{ old('email') }}">
				@if ($errors->has('email'))
					<span class="help-block">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
				@endif
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4">
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-btn fa-envelope"></i>Send Password Reset Link
				</button>
			</div>
		</div>
  {!! Form::close() !!}
</div>
@endsection