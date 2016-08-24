<h2>{{ trans('panel.general_information') }}</h2>
<div class="form-group">
  {!! Form::label('characteristics', trans('forms.required', ['field' => trans('forms.characteristics')])) !!}
  {!! Form::text('characteristics', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('clothes', trans('forms.clothes')) !!}
  {!! Form::text('clothes', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('observations', trans('forms.observations')) !!}
  {!! Form::text('observations', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('found_at', trans('forms.found_at')) !!}
  {!! Form::text('found_at', null, ['class' => 'form-control date']) !!}
</div>
<div class="divider"></div>

<h2>{{ trans('panel.location') }}</h2>
@if (getenv('LOCATION_MODE') == 'countries')
  <div class="form-group">
    {!! Form::label('country_id', trans('forms.required', ['field' => trans('forms.country')])) !!}
    {!! Form::select('country_id', $countries, null, ['placeholder' => trans('forms.select_one', ['field' => trans('panel.country')]),'class' => 'form-control', 'onchange' => 'changeProvinceSelect("' . $provinces_for_each_country . '")']) !!}
  </div>
@endif
<div class="form-group" id="province-select">
  {!! Form::label('province_id', trans('forms.required', ['field' => trans('forms.province')])) !!}
  {!! Form::select('province_id', $provinces, null, ['placeholder' => trans('forms.select_one', ['field' => trans('panel.province')]), 'class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('area', trans('forms.area')) !!}
  {!! Form::text('area', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('address', trans('forms.address')) !!}
  {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>
<div class="divider"></div>

<h2>{{ trans('panel.contact_details') }}</h2>
<div class="form-group">
  {!! Form::label('contributor[name]', trans('forms.required', ['field' => trans('forms.name')])) !!}
  {!! Form::text('contributor[name]', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('contributor[phone]', trans('forms.required', ['field' => trans('forms.phone')])) !!}
  {!! Form::text('contributor[phone]', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('contributor[email]', trans('forms.email')) !!}
  {!! Form::text('contributor[email]', null, ['class' => 'form-control']) !!}
</div>

<a href="{{ route('panel.people.contributions.show', $contribution->id) }}" class="btn btn-primary">
  <i class="material-icons">arrow_back</i>
  {{ trans('panel.contribution') }}
</a>

<button type="submit" class="btn btn-success">
  <i class="material-icons">{{ $submitButtonIcon }}</i>
  {{ $submitButtonText }}
</button>