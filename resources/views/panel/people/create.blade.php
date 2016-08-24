@extends ('layouts.panel', ['user' => $user])

@section ('content')
<div class="container">
  @include ('errors.list')

  {!! Form::open(['route' => 'panel.people.store', 'files' => true]) !!}
    @include ('panel.people._form', ['create' => true, 'submitButtonIcon' => 'add', 'submitButtonText' => trans('forms.add')])
  {!! Form::close() !!}
</div>
@endsection

@section ('styles')
<link rel="stylesheet" href="{{ url('/') }}/css/bootstrap-datepicker3.min.css">
@endsection

@section ('scripts')
<script src="{{ url('/') }}/js/datepicker/bootstrap-datepicker.min.js"></script>
<script src="{{ url('/') }}/js/datepicker/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>
<script>
  $('#{{ $status }}').attr('checked', 'checked');
  changeDatesFromStatus('{{ $status }}');

  $('.date').datepicker({
    format: ('{{ Config::get("app.locale") }}' == 'es') ? 'dd/mm/yyyy' : 'mm/dd/yyyy',
    language: '{{ Config::get("app.locale") }}',
    startDate: '1/1/1900',
    endDate: '0d',
    autoclose: true,
    todayBtn: 'linked',
  });
</script>
@endsection