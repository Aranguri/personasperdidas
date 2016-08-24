<html>
<head>
  <link rel="stylesheet" href="{{ url('/') }}/css/semantic.min.css">
  <link rel="stylesheet" href="{{ url('/') }}/css/icon.min.css">
  <link rel="stylesheet" href="{{ url('/') }}/css/home/style.css">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
  <div class="ui container center">
    <h1 id="print-title">
      @if ($person->name && $person->surname)
        {{ trans('home.print.name_surname_' . $person->status, ['name' => $person->name, 'surname' => $person->surname]) }}
      @elseif ($person->name)
        {{ trans('home.print.name_' . $person->status, ['name' => $person->name]) }}
      @elseif ($person->surname)
        {{ trans('home.print.surname_' . $person->status, ['surname' => $person->surname]) }}
      @endif
    </h1>
    <img class="ui centered rounded image" id="print-person-image" src="{{ URL('/') }}/images/people/{{ $person->id }}.jpg">
    <h2>
      @if ($person->name && $person->surname)
        {{ trans('home.description.name_surname_' . $person->status, ['name' => $person->name, 'surname' => $person->surname]) }}
      @elseif ($person->name)
        {{ trans('home.description.name_' . $person->status, ['name' => $person->name]) }}
      @elseif ($person->surname)
        {{ trans('home.description.surname_' . $person->status, ['surname' => $person->surname]) }}
      @endif

      @if ($person->missing_at && getLocation($person))
        {{ trans('home.description.date_location_' . $person->status, ['article' => trans('home.description.article_' . $person->gender), 'date' => $person->missing_at, 'location' => getLocation($person)]) }}
      @elseif ($person->missing_at)
        {{ trans('home.description.date_' . $person->status, ['article' => trans('home.description.article_' . $person->gender), 'date' => $person->missing_at]) }}
      @elseif (getLocation($person))
        {{ trans('home.description.location_' . $person->status, ['article' => trans('home.description.article_' . $person->gender), 'location' => getLocation($person)]) }}
      @endif
    </h2>
    <h3>
      @if ($person->birth_year)
        {{ trans('home.description.age', ['article' => trans('home.description.article_' . $person->gender), 'age' => $person->birth_year]) }}
      @endif

      {{ $person->characteristics }}

      @if ($person->clothes)
        {{ $person->clothes }}
      @endif

      @if ($person->observations)
        {{ $person->observations }}
      @endif

      @if ($person->diseases)
        {{ trans('home.description.diseases') }}
      @endif
    </h3>
    <h2>
      {{ trans('home.print.more_information') }}
      <br>
      {{ url('/') }}/{{ $person->id }}
      <br>
      @if ($contactDetails->facebook)
        <i class="facebook icon"></i>facebook.com/{{ $contactDetails->facebook }}
        <br>
      @endif
      @if ($contactDetails->twitter)
        <i class="twitter icon"></i>twitter.com/{{ $contactDetails->twitter }}
      @endif
      @if ($contactDetails->instagram)
        <i class="instagram icon"></i>instagram.com/{{ $contactDetails->instagram }}
      @endif
    </h2>
  </div>
</body>
</html>