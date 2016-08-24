@extends ('layouts.panel')

@section ('content')
<div class="container">
  @include ('errors.list')

  {!! Form::model($contribution, ['method' => 'POST', 'route' => ['panel.people.contributions.update', $contribution->id]]) !!}
    @include ('panel.contributions._form', ['submitButtonIcon' => 'save', 'submitButtonText' => trans('forms.save')])
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
  $('#country_id').val('{{ $contribution->province->country->id }}');
  $('#province_id').val('{{ $contribution->province->id }}');

  $('.date').datepicker({
    format: ('{{ config("app.date_format") }}' == 'd/m/Y') ? 'dd/mm/yyyy' : 'mm/dd/yyyy',
    language: '{{ config("app.locale") }}',
    startDate: '1/1/1900',
    endDate: '0d',
    autoclose: true,
    todayBtn: 'linked',
  });
</script>
@endsection
