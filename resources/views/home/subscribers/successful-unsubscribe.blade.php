@extends ('layouts.home')

@section ('content')
<div class="ui container center" id="successful-unsubscribe-container">
  <h1>{{ trans('home.successful_unsubscribe') }}</h1>
  <h2 class="ui green header">{{ trans('home.successful_unsubscribe_message.1') }}</h2>
  <h2>{{ trans('home.successful_unsubscribe_message.2') }} <a href="{{ route('home.subscribers.subscribe') }}">{{ trans('home.here') }}</a></h2>
</div>
@endsection