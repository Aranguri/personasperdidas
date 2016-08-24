@extends ('layouts.panel')

@section ('content')
<div class="container">
  <h1>{{ trans('panel.stats') }}</h1>
  <h2>{{ trans('panel.people') }}</h2>
  @foreach (Config::get('constants.status') as $status)
    <h4>{{ trans('forms.' . $status . '_plural') }}: {{ $people->where('status', $status)->count() }}</h4>
  @endforeach
  <div class="divider"></div>

  <h2>{{ trans('forms.others') }}</h2>
  @if (getenv('LOCATION_MODE') == 'countries')
    <h4>{{ trans('panel.countries') }}: {{ $countries->count() }}</h4>
  @endif
  <h4>{{ trans('panel.provinces') }}: {{ $provinces->count() }}</h4>
  <h4>{{ trans('panel.users') }}: {{ $users->count() }}</h4>
  <h4>{{ trans('panel.subscribers') }}: {{ $subscribers->count() }}</h4>
  <h4>{{ trans('panel.suggestions') }}: {{ $suggestions->count() }}</h4>
  <h4>{{ trans('panel.collaborators') }}: {{ $collaborators->count() }}</h4>
  <h4>{{ trans('panel.people_contributions') }}: {{ $contributions->count() }}</h4>
  <h4>{{ trans('panel.people_comments') }}: {{ $comments->count() }}</h4>
</div>
@endsection