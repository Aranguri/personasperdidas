<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#2980b9">
  <title>Panel de Personas Perdidas</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="{{ includeAsset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ includeAsset('css/panel/style.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
  <link rel="icon" href="{{ includeAsset('favicon.ico') }}" type="image/x-icon">
  @yield('styles')
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand"><!-- href="{{ route('panel.index') }}">-->
          <img id="navbar-brand-image" src="{{ url('/') }}/images/src/logo.png">
        </a>
        <a class="navbar-brand navbar-toggle" id="title">
          {{ setTitle() }}
        </a>
      </div>
      <div class="navbar-collapse collapse" id="bs-navbar">
        <ul class="nav navbar-nav">
          @if (!isset($logged_user) || $logged_user->hierarchy == 0)
            <li class="{{ setActive('people') }}"><a href="{{ route('panel.people.index', 'missing_to_validate') }}">{{ trans('panel.people') }}</a></li>
            @if (getenv('LOCATION_MODE') == 'countries')
              <li class="{{ setActive('countries') }}"><a href="{{ route('panel.countries.index') }}">{{ trans('panel.countries') }}</a></li>
            @endif
            <li class="{{ setActive('provinces') }}"><a href="{{ route('panel.provinces.index') }}">{{ trans('panel.provinces') }}</a></li>
            <li class="{{ setActive('users') }}"><a href="{{ route('panel.users.index') }}">{{ trans('panel.users') }}</a></li>
            <li class="{{ setActive('subscribers') }}"><a href="{{ route('panel.subscribers.index') }}">{{ trans('panel.subscribers') }}</a></li>
            <li class="{{ setActive('suggestions') }}"><a href="{{ route('panel.suggestions.index') }}">{{ trans('panel.suggestions') }}</a></li>
            <li class="{{ setActive('stats') }}"><a href="{{ route('panel.stats.index') }}">{{ trans('panel.stats') }}</a></li>
            <li class="{{ setActive('collaborators') }}"><a href="{{ route('panel.collaborators.index') }}">{{ trans('panel.collaborators') }}</a></li>
            <li class="{{ setActive('contact-details') }}"><a href="{{ route('panel.contact-details.index') }}">{{ trans('panel.contact_details') }}</a></li>
          @else
            <li class="{{ setActive('missing_to_validate') }}">
              <a href="{{ route('panel.people.index', 'missing_to_validate') }}">{{ trans('forms.missing_to_validate') }}</a>
            </li>
            <li class="{{ setActive('found_to_validate') }}">
              <a href="{{ route('panel.people.index', 'found_to_validate') }}">{{ trans('forms.found_to_validate') }}</a>
            </li>
            <li class="{{ setActive('missing') }}">
              <a href="{{ route('panel.people.index', 'missing') }}">{{ trans('forms.missing') }}</a>
            </li>
            <li class="{{ setActive('found') }}">
              <a href="{{ route('panel.people.index', 'found') }}">{{ trans('forms.found') }}</a>
            </li>
            <li class="{{ setActive('finished') }}">
              <a id="dropdownMenuFinished" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" href="">
                {{ trans('forms.finished') }}
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuFinished">
                <li><a href="{{ route('panel.people.index', 'missing_found_with_life') }}">{{ trans('forms.missing_found_with_life') }}</a></li>
                <li><a href="{{ route('panel.people.index', 'missing_found_without_life') }}">{{ trans('forms.missing_found_without_life') }}</a></li>
                <li><a href="{{ route('panel.people.index', 'found_refound') }}">{{ trans('forms.found_refound') }}</a></li>
                <li><a href="{{ route('panel.people.index', 'closed') }}">{{ trans('forms.closed') }}</a></li>
              </ul>
            </li>
          @endif
          <li><a href="{{ route('auth.logout') }}">{{ trans('panel.logout') }}</a></li>
        </ul>
      </div>
    </div>
  </nav>
  @yield('content')
  <script type="text/javascript" src="{{ includeAsset('js/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ includeAsset('js/panel/main.js') }}"></script>
  <script type="text/javascript" src="{{ includeAsset('js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
  <script type="text/javascript" src="{{ includeAsset('js/panel/aviary.min.js') }}"></script>
  @yield('scripts')
</body>
</html>
