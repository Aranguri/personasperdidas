@extends ('layouts.home')

@section ('content')
<div class="ui container center" id="successful-report-container">
  <h1>{{ trans('home.successful_report') }}</h1>
  <h2 class="ui green header">{{ trans('home.successful_report_messages.1') }}</h2>
  <h2>{{ trans('home.successful_report_messages.2') }}</h2>
  @if ($status == 'missing')
    <h2>{{ trans('home.successful_report_messages.3') }} <a href="{{ route('home.recommendations') }}">{{ trans('home.here')}}</a>.</h2>
  @endif
</div>
@endsection