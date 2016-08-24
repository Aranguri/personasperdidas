@extends ('layouts.home')

@section ('content')
<div class="ui container center" id="successful-suggestion-container">
  <h1>{{ trans('home.successful_suggestion') }}</h1>
  <h2 class="ui green header">{{ trans('home.successful_suggestion_message') }}</h2>
</div>
@endsection