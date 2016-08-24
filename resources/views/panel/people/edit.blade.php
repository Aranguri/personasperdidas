@extends ('layouts.panel', ['user' => $user])

@section ('content')
<div class="container">
  @include ('errors.list')

  {!! Form::model($person, ['method' => 'PATCH', 'action' => ['Panel\PersonController@update', $person->id]]) !!}
    @include ('panel.people._form', ['create' => false, 'submitButtonIcon' => 'save', 'submitButtonText' => trans('forms.save')])
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
  $('#country_id').val('{{ $person->country->id }}');

  changeDatesFromStatus('{{ $status }}');

  $('.date').datepicker({
    format: ('{{ config("app.date_format") }}' == 'd/m/Y') ? 'dd/mm/yyyy' : 'mm/dd/yyyy',
    language: '{{ config("app.locale") }}',
    startDate: '1/1/1900',
    endDate: '0d',
    autoclose: true,
    todayBtn: 'linked',
  });
</script>
@if ($person->province)
  <script>
    changeProvinceSelect('{{ $provinces_for_each_country }}', '{{ $person->province->id }}');
  </script>
@else
  <script>
    changeProvinceSelect('{{ $provinces_for_each_country }}');
  </script>
@endif
@endsection