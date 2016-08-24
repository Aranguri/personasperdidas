@extends ('layouts.panel')

@section ('content')
<div class="container">
  @include ('errors.list')

  {!! Form::model($province, ['method' => 'PATCH', 'action' => ['Panel\ProvinceController@update', $province->id]]) !!}
    @include ('panel.provinces._form', ['submitButtonIcon' => 'save', 'submitButtonText' => trans('forms.save')])
  {!! Form::close() !!}
</div>
@endsection