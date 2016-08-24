@extends ('layouts.panel')

@section ('content')
<div class="container">
  @include ('errors.list')

  {!! Form::model($country, ['method' => 'PATCH', 'action' => ['Panel\CountryController@update', $country->id]]) !!}
    @include ('panel.countries._form', ['submitButtonIcon' => 'save', 'submitButtonText' => trans('forms.save')])
  {!! Form::close() !!}
</div>
@endsection