<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#2980b9">
  @yield ('facebook-meta-tags')
  <title>Personas Perdidas</title>
  <link rel="stylesheet" href="{{ includeAsset('css/semantic.min.css') }}">
  <link rel="stylesheet" href="{{ includeAsset('css/icon.min.css') }}">
  <link rel="stylesheet" href="{{ includeAsset('css/sidebar.min.css') }}">
  <link rel="stylesheet" href="{{ includeAsset('css/home/style.css') }}">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="icon" href="{{ includeAsset('favicon.ico') }}" type="image/x-icon">
  @yield ('styles')
</head>
<body>
  <div class="ui left vertical menu sidebar" id="sidebar">
    <a class="item {{ setActiveHome('/') }}" href="{{ route('home.people.index') }}">{{ trans('home.missing') }}</a>
    <a class="item {{ setActiveHome('looking_for_their_families') }}" href="{{ route('home.people.index', 'looking_for_their_families') }}">{{ trans('home.looking_for_their_families') }}</a>
    <a class="item {{ setActiveHome('recommendations') }}" href="{{ route('home.recommendations') }}">{{ trans('home.recommendations') }}</a>
    <a class="item {{ setActiveHome('report') }}" href="{{ route('home.people.create') }}">{{ trans('home.report') }}</a>
  </div>
  <div class="pusher" id="wrapper">
    <div class="ui top fixed menu" id="desktop-navbar">
      <div class="ui menu navbar-items">
        <div class="item">
          <img class="ui mini rounded image" src="{{ url('/') }}/images/src/logo.png">
        </div>
        <a class="item {{ setActiveHome('/') }}" href="{{ route('home.people.index') }}">{{ trans('home.missing') }}</a>
        <a class="item {{ setActiveHome('looking_for_their_families') }}" href="{{ route('home.people.index', 'looking_for_their_families') }}">{{ trans('home.looking_for_their_families') }}</a>
        <div class="right menu">
          <a class="item {{ setActiveHome('recommendations') }}" href="{{ route('home.recommendations') }}">{{ trans('home.recommendations') }}</a>
          <a class="item {{ setActiveHome('report') }}" href="{{ route('home.people.create') }}">{{ trans('home.report') }}</a>
        </div>
      </div>
    </div>
    <div class="ui top fixed secondary menu" id="mobile-navbar">
      <div class="ui menu navbar-items">
        <div class="item">
          <i class="material-icons" onclick="toggleSidebar()">menu</i>
        </div>
        <div class="item">
          <p>{{ trans('home.' . setHomeTitle()) }}</p>
        </div>
      </div>
    </div>
    @yield ('content')
    <div class="ui inverted vertical footer segment">
      <div class="ui center aligned container">
        <div class="ui stackable inverted divided grid">
          @if ($contactDetails)
            <div class="four wide column footer-item">
              <h4 class="ui inverted header">{{ trans('home.social_networks') }}</h4>
              <div class="ui inverted link list">
                @if ($contactDetails->facebook)
                  <a class="item" href="https://facebook.com/{{ $contactDetails->facebook }}" target="_blank">
                    <i class="facebook icon"></i>
                    {{ trans('home.facebook') }}
                  </a>
                @endif
                @if ($contactDetails->twitter)
                  <a class="item" href="https://twitter.com/{{ $contactDetails->twitter }}" target="_blank">
                    <i class="twitter icon"></i>
                    {{ trans('home.twitter') }}
                  </a>
                @endif
                @if ($contactDetails->instagram)
                  <a class="item" href="https://instagram.com/{{ $contactDetails->instagram }}" target="_blank">
                    <i class="instagram icon"></i>
                    {{ trans('home.instagram') }}
                  </a>
                @endif
              </div>
            </div>
            <div class="four wide column footer-item">
              <h4 class="ui inverted header">{{ trans('home.contact_details') }}</h4>
              <div class="ui inverted link list">
                @if ($contactDetails->phone)
                  <a class="item" href="tel:{{ $contactDetails->phone }}">
                    <i class="phone icon"></i>
                    {{ $contactDetails->phone }}
                  </a>
                @endif
                @if ($contactDetails->public_email)
                  <a class="item" href="mailto:{{ $contactDetails->public_email }}">
                    <i class="mail icon"></i>
                    {{ $contactDetails->public_email }}
                  </a>
                @endif
              </div>
            </div>
            <div class="eight wide column footer-item">
          @else
            <div class="sixteen wide column footer-item">
          @endif
            <h4 class="ui inverted header">{{ trans('home.subscribe_for_alerts_of_missing_people') }}</h4>
            {!! Form::open(['route' => 'home.subscribers.footerStore', 'class' => 'ui form', 'id' => 'subscriber-form']) !!}
              <div class="ui action inverted input">
                {!! Form::text('footer_email', null, ['id' => 'subscribe-email', 'placeholder' => trans('forms.email')]) !!}
                <button class="ui inverted button">{{ trans('forms.send') }}</button>
              </div>
            {!! Form::close() !!}
          </div>
        </div>
        <div class="ui inverted section divider"></div>
        <div class="ui horizontal inverted small divided link list">
          @if ($are_collaborators)
            <a class="item" href="{{ route('home.collaborators') }}">{{ trans('home.collaborators') }}</a>
          @endif
          <a class="item" href="{{ route('home.suggestions.create') }}">{{ trans('home.send_feedback') }}</a>
          <a class="item" href="{{ route('home.developers.create') }}">{{ trans('home.developers_title') }}</a>
          <a class="item" href="{{ route('home.privacy') }}">{{ trans('home.privacy') }}</a>
          <a class="item" href="{{ route('home.terms') }}">{{ trans('home.terms') }}</a>
        </div>
      </div>
    </div>
  </div>
  </div>
  <script type="text/javascript" src="{{ includeAsset('js/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ includeAsset('js/semantic.min.js') }}"></script>
  <script type="text/javascript" src="{{ includeAsset('js/sidebar.min.js') }}"></script>
  <script type="text/javascript" src="{{ includeAsset('js/home/main.js') }}"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
  @yield ('scripts')
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-79239768-2', 'auto');
    ga('send', 'pageview');
    ga(function(tracker) {
      // Logs the tracker created above to the console.
      console.log(tracker);
    });
    </script>
    <script>
      window.twttr = (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0],
          t = window.twttr || {};
        if (d.getElementById(id)) return t;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://platform.twitter.com/widgets.js";
        fjs.parentNode.insertBefore(js, fjs);

        t._e = [];
        t.ready = function(f) {
          t._e.push(f);
        };

        return t;
      }(document, "script", "twitter-wjs"));
    </script>
</body>
</html>

