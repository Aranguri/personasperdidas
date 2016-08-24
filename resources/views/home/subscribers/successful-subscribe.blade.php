@extends ('layouts.home')

@section ('content')
<div class="ui container center" id="successful-subscribe-container">
  <h1>{{ trans('home.successful_subscribe') }}</h1>
  <h2 class="ui green header">{{ trans('home.successful_subscribe_message.1') }}</h2>
  <h2>{{ trans('home.successful_subscribe_message.2') }}</h2>
</div>
@endsection