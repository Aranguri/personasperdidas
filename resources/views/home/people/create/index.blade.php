@extends ('layouts.home')

@section ('content')
<div class="ui container center">
  {!! Form::open(['route' => ['home.people.store', $status], 'files' => true, 'class' => 'ui form large-form', 'id' => 'person-form']) !!}
    @include ('home.people.create._form')
  {!! Form::close() !!}
</div>
@endsection

@section ('scripts')
<script>
  $('select.dropdown')
    .dropdown()
  ;
  $('.checkbox')
    .checkbox()
    .first().checkbox({
      onChecked: function() {
        toggleInputDisease('enable');
      },
      onUnchecked: function() {
        toggleInputDisease('disable');
      }
    })
  ;
</script>
@endsection