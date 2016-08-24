@extends ('layouts.home')

@section ('facebook-meta-tags')
<meta property="og:url" content="{{ personUrl($person) }}" />
<meta property="og:type" content="profile" />
@if ($person->status == 'missing')
  <meta property="og:title" content="{{ trans('home.person.title_missing', ['name' => $person->name, 'surname' => $person->surname]) }}" />
  <meta property="og:description" content="{{ trans('home.person.description_missing', ['name' => $person->name, 'surname' => $person->surname, 'seen' => trans('home.person.seen_' . $person->gender), 'address' => getLocation($person), 'date' => $person->missing_at]) }}" />
@else
  <meta property="og:title" content="{{ trans('home.person.title_found', ['name' => $person->name, 'surname' => $person->surname]) }}" />
  <meta property="og:description" content="{{ trans('home.person.description_found', ['name' => $person->name, 'surname' => $person->surname, 'found' => trans('home.person.found_' . $person->gender), 'article' => ($person->gender == 'woman') ? 'she' : 'he', 'address' => getLocation($person), 'date' => $person->found_at]) }}" />
@endif
<meta property="og:image" content="{{ URL('/') }}/images/people/{{ $person->id }}_256.jpg" />
<meta property="fb:app_id" content="145634995501895" />
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@adultosperdidos">
<meta name="twitter:creator" content="@adultosperdidos">
@endsection

@section ('content')
<div class="ui container center">
  <div class="ui stackable grid" id="person-header">
    <div class="three column row">
      <div class="left aligned column" id="person-header-col-1">
        <a class="ui blue button" href="{{ route('home.people.index', urlParameterFromStatus($person->status)) }}">
          <i class="arrow left icon"></i>
          {{ trans('home.return_to_home', ['model' => strtolower(trans('forms.' . $person->status . '_plural_female'))]) }}
        </a>
      </div>
      <div class="column" id="person-header-col-2">
        <h1>{{ getName($person) }}</h1>
      </div>
      <div class="column" id="person-header-col-3"></div>
    </div>
  </div>
  <div id="person-actions">
    <a class="ui facebook button" id="person-btn-fb" href="#" onclick="facebookPublish('{{ personUrl($person) }}')">
      <i class="facebook icon"></i>
      {{ trans('home.share') }}
    </a>
    <a class="ui twitter button" id="person-btn-tw" href="#" onclick="twitterPublish(
      '{{ personUrl($person) }}',
      '{{ trans('home.tweet.' . $person->status . '.hashtag', ['name' => $person->name]) }}',
      '{{ trans('home.tweet.' . $person->status . '.looking_for', ['name' => $person->name, 'surname' => $person->surname]) }}',
      '{{ trans('home.tweet.' . $person->status . '.location', ['area_province' => getAreaProvince($person)]) }}',
      '{{ trans('home.tweet.help_diffusion') }}'
      )">
      <i class="twitter icon"></i>
      {{ trans('home.tweet.title') }}
    </a>
    <a class="ui green button" id="person-btn-print" href="#" onclick="print('{{ url('/') }}/print/{{ $person->id }}')">
      <i class="print icon"></i>
      {{ trans('home.print.title') }}
    </a>
    </a>
  </div>
  <img class="ui centered rounded image" id="person-image" src="{{ URL('/') }}/images/people/{{ $person->id }}.jpg">
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
    @if ($person->previous_description)
      {{ $person->previous_description }}
    @else
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
    @endif
  </h3>
  <div class="center" id="send-contribution">
    <a class="ui green button" href="{{ route('home.people.contributions.create', $person->id) }}">
      {{ trans('home.send_contribution', ['name' => getName($person)]) }}
    </a>
  </div>
</div>
@endsection