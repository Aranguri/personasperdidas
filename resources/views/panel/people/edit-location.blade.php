@extends ('layouts.panel', ['user' => $user])

@section ('content')
<div class="container">
  <div class="input-group" id="input-group-address">
    <span class="input-group-addon">{{ trans('forms.address') }}</span>
    {!! Form::text('address', getLocation($person), ['class' => 'form-control', 'id' => 'address']) !!}
    <span class="span-submit-comment">
      <a class="btn btn-primary button-inline-field" onclick="addressToCoordinates()">
        <i class="material-icons">search</i>
        {{ trans('panel.search_location') }}
      </a>
    </span>
  </div>
  <div id="map-not-found" class="no-display">{{ trans('panel.map_not_found') }}</div>
  <div id="map"></div>
  {!! Form::open(['route' => ['panel.people.location.store', $person->id], 'class' => 'no-display', 'id' => 'send-coordinates-form']) !!}
    {!! Form::hidden('latitude', null, ['id' => 'latitude']) !!}
    {!! Form::hidden('longitude', null, ['id' => 'longitude']) !!}
    <button type="submit" class="btn btn-success">
      <i class="material-icons">save</i>
      {{ trans('forms.save') }}
    </button>
  {!! Form::close() !!}
</div>
@endsection

@section ('scripts')
@if ($person->latitude || $person->longitude)
  <script>initMap('edit', '{{ $person->latitude }}', '{{ $person->longitude }}');</script>
@elseif (getLocation($person))
  <script>initMap('edit');</script>
  <script>addressToCoordinates('{{ getLocation($person) }}')</script>
@else
  <script>initMap('edit');</script>
@endif
@endsection