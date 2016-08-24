<div class="form-group">
  {!! Form::label('name', trans('forms.name')) !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('email', trans('forms.email')) !!}
  {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

@if ($create)
  <div class="form-group">
    {!! Form::label('password', trans('forms.password')) !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('password_confirmation', trans('forms.password_confirmation')) !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
  </div>
@endif

@if (getenv('LOCATION_MODE') == 'countries')
  <div class="form-group">
    {!! Form::label('hierarchy', trans('forms.hierarchy')) !!}
    {!! Form::select('hierarchy', ['0' => trans('forms.general_access'), '1' => trans('forms.people_access'), '2' => trans('forms.country_access'), '3' => trans('forms.province_access')], null, ['placeholder' => trans('forms.select_one', ['field' => trans('forms.hierarchy')]), 'class' => 'form-control', 'onchange' => 'changeUsersHierarchySelect("countries")']) !!}
  </div>
@else
  <div class="form-group">
    {!! Form::label('hierarchy', trans('forms.hierarchy')) !!}
    {!! Form::select('hierarchy', ['0' => trans('forms.general_access'), '1' => trans('forms.people_access'), '3' => trans('panel.province_access')], null, ['placeholder' => trans('forms.select_one', ['field' => trans('forms.hierarchy')]), 'class' => 'form-control', 'onchange' => 'changeUsersHierarchySelect("provinces")']) !!}
  </div>
@endif

<div class="form-group no-display" id="country-select">
  {!! Form::label('country_id', trans('panel.country')) !!}
  {!! Form::select('country_id', $countries, null, ['placeholder' => trans('forms.select_one', ['field' => trans('panel.country')]), 'class' => 'form-control', 'onchange' => 'changeProvinceSelect("' . $provinces_for_each_country . '")']) !!}
</div>

<div class="form-group no-display" id="province-select">
  {!! Form::label('province_id', trans('panel.province')) !!}
  {!! Form::select('province_id', $provinces, null, ['placeholder' => trans('forms.select_one', ['field' => trans('panel.province')]), 'class' => 'form-control']) !!}
</div>

<a href="{{ route('panel.users.index') }}" class="btn btn-primary">
  <i class="material-icons">arrow_back</i>
  {{ trans('panel.users') }}
</a>

<button type="submit" class="btn btn-success">
  <i class="material-icons">{{ $submitButtonIcon }}</i>
  {{ $submitButtonText }}
</button>