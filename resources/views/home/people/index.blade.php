@extends ('layouts.home')

@section ('content')
<div class="ui container">
  {!! Form::open(['route' => ['home.people.search', urlParameterFromStatus($status)], 'class' => 'ui form', 'id' => 'search-form']) !!}
    <div class="ui action input">
      {!! Form::text('search', null, ['id' => 'search-text', 'placeholder' => trans('forms.search_text')]) !!}
      <button class="ui blue button">{{ trans('forms.search') }}</button>
    </div>
  {!! Form::close() !!}
    @if ($people->toArray()['total'] != 0)
      <div class="ui special cards grid">
        @foreach ($people as $person)
          <div class="ui card grid-item">
            <div class="blurring dimmable image item-image" id="item-image{{ $person->id }}">
              <div class="ui dimmer">
                <div class="content">
                  <div class="center">
                    <a href="{{ personUrl($person) }}">
                      <div class="ui inverted button">{{ trans('home.more_details') }}</div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="content">
              <a class="header">{{ getName($person) }}</a>
              <div class="description">
                @if ($status == 'missing')
                  {{ trans('forms.last_seen') }}: {{ convertFromCarbonDate($person->missing_at) }}
                @elseif ($status == 'found')
                  {{ trans('forms.found_at') }}: {{ convertFromCarbonDate($person->found_at) }}
                @else
                  {{ trans('forms.found_at') }}: {{ convertFromCarbonDate($person->closure_at) }}
                @endif
              </div>
            </div>
            <div class="extra content center">
              <a class="ui facebook button" id="index-btn-fb" href="#" onclick="facebookPublish('{{ personUrl($person) }}')">
                <i class="facebook icon"></i>
                {{ trans('home.share') }}
              </a>
              <a class="ui twitter button" id="index-btn-tw" href="#" onclick="twitterPublish(
                '{{ personUrl($person) }}',
                '{{ trans('home.tweet.' . $person->status . '.hashtag', ['name' => $person->name]) }}',
                '{{ trans('home.tweet.' . $person->status . '.looking_for', ['name' => $person->name, 'surname' => $person->surname]) }}',
                '{{ trans('home.tweet.' . $person->status . '.location_' . $person->gender, ['area_province' => getAreaProvince($person)]) }}',
                '{{ trans('home.tweet.help_diffusion') }}'
                )">
                <i class="twitter icon"></i>
                {{ trans('home.tweet.title') }}
              </a>
            </div>
          </div>
        @endforeach
        @include('partials.pagination', ['paginator' => $people, 'interval' => 5])
      </div>
    @else
      <h2 class="center">{{ trans('home.no_results') }}</h2>
    @endif
</div>
@endsection

@section ('scripts')
<script>
$('.special.cards .image').dimmer({
  on: 'hover'
});
</script>
@foreach ($people as $person)
  <script>$('#item-image{{ $person->id }}').css('background', 'url("/images/people/{{ $person->id }}_256.jpg") center / cover');</script>
@endforeach
@endsection