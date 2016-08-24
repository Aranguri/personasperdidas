@extends ('layouts.home')

@section ('content')
<div class="ui container" id="collaborators-container">
  <h1>{{ trans('home.collaborators') }}</h1>
  <div class="ui list">
  @foreach ($collaborators as $collaborator)
    <div class="item"><h3><a href="{{ $collaborator->web }}">{{ $collaborator->name }}</a></h3></div>
  @endforeach
  </div>
</div>
@endsection