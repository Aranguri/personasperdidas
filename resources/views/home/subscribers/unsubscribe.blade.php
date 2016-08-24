@extends ('layouts.home')

@section ('content')
<div class="ui container center" id="unsubscribe-container">
  <h1>{{ trans('home.unsubscribe_title') }}</h1>
  <h3 class="error-message" id="error-message">
    @include ('errors.inline')
  </h3>

  {!! Form::open(['route' => 'home.subscribers.delete', 'class' => 'ui form large-form', 'id' => 'unsubscribe-form', 'method' => 'delete']) !!}
    @include ('home.subscribers._form', ['button_action' => 'unsubscribe'])
  {!! Form::close() !!}
</div>
@endsection