<div class="form-group">
  {!! Form::label('name', trans('forms.required', ['field' => trans('forms.name')])) !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

@if (getenv('LOCATION_MODE') == 'countries')
  <div class="form-group">
    {!! Form::label('country_id', trans('forms.required', ['field' => trans('forms.country')])) !!}
    {!! Form::select('country_id', $countries, null, ['placeholder' => trans('forms.select_one', ['field' => trans('panel.country')]),'class' => 'form-control']) !!}
  </div>
@endif

<a href="{{ route('panel.provinces.index') }}" class="btn btn-primary">
  <i class="material-icons">arrow_back</i>
  {{ trans('panel.provinces') }}
</a>

<button type="submit" class="btn btn-success">
  <i class="material-icons">{{ $submitButtonIcon }}</i>
  {{ $submitButtonText }}
</button>