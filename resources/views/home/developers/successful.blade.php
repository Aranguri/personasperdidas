@extends ('layouts.home')

@section ('content')
<div class="ui container center" id="successful-developer-container">
  <h1>{{ trans('home.successful_developer') }}</h1>
  <h2 class="ui green header">{{ trans('home.successful_developer_messages.1') }}</h2>
  <h2>{{ trans('home.successful_developer_messages.2') }}</h2>
</div>
@endsection