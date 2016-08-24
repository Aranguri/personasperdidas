@extends ('layouts.home')

@section ('content')
<div class="ui container center" id="subscribe-container">
  <h1>{{ trans('home.subscribe_title') }}</h1>
  <h3 class="error-message" id="error-message">
    @include ('errors.inline')
  </h3>

  {!! Form::open(['route' => 'home.subscribers.store', 'class' => 'ui form large-form', 'id' => 'subscribers-form']) !!}
    @include ('home.subscribers._form', ['button_action' => 'subscribe'])
  {!! Form::close() !!}
</div>
@endsection