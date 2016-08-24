<h2>{{ trans('panel.general_information') }}</h2>

<div class="form-group" id="people-status-form">
  {!! Form::label('status',  trans('forms.required', ['field' => trans('forms.status'), 'onchange' => 'changeDatesFromStatus()'])) !!}
  <br>
  <?php $i = 0; ?>
  <?php $general_status = $status; ?>
  @foreach (Config::get('constants.status') as $status)
    <?php $i++; ?>
    {!! Form::radio('status', $status, null, ['id' => $status]) !!}
    {!! Form::label($status, trans('forms.' . $status)) !!}
    @if ($i == 4)
      <br>
    @endif
  @endforeach
</div>
<div class="form-group">
  {!! Form::label('name', trans('forms.required', ['field' => trans('forms.name')])) !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('surname', trans('forms.required', ['field' => trans('forms.surname')])) !!}
  {!! Form::text('surname', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('nickname', trans('forms.nickname')) !!}
  {!! Form::text('nickname', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('birth_year', trans('forms.required', ['field' => trans('forms.age')])) !!}
  {!! Form::number('birth_year', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('characteristics', trans('forms.characteristics')) !!}
  {!! Form::text('characteristics', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('gender', trans('forms.required', ['field' => trans('forms.gender')])) !!}
  {!! Form::select('gender', ['man' => trans('forms.man'), 'woman' => trans('forms.woman'), 'other' => trans('forms.other')], null, ['placeholder' => trans('forms.select_one', ['field' => trans('forms.gender')]), 'class' => 'form-control']) !!}
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
  {!! Form::label('province_id', trans('forms.province')) !!}
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

<h2>{{ trans('panel.more_information') }}</h2>
<div class="form-group" id="missing-at">
  {!! Form::label('missing_at', trans('forms.required', ['field' => trans('forms.missing_at')])) !!}
  {!! Form::text('missing_at', null, ['class' => 'form-control date']) !!}
</div>
<div class="form-group" id="found-at">
  {!! Form::label('found_at', trans('forms.required', ['field' => trans('forms.found_at')])) !!}
  {!! Form::text('found_at', null, ['class' => 'form-control date']) !!}
</div>
<div class="form-group" id="closure-at">
  {!! Form::label('closure_at', trans('forms.required', ['field' => trans('forms.closure_at')])) !!}
  {!! Form::text('closure_at', null, ['class' => 'form-control date']) !!}
</div>
<div class="form-group">
  {!! Form::label('clothes', trans('forms.clothes')) !!}
  {!! Form::text('clothes', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('diseases', trans('forms.diseases')) !!}
  {!! Form::text('diseases', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('observations', trans('forms.observations')) !!}
  {!! Form::text('observations', null, ['class' => 'form-control']) !!}
</div>
@if ($create)
  <div class="form-group">
    {!! Form::label('image', trans('forms.image')) !!}
    {!! Form::file('image', ['class' => 'form-control']) !!}
  </div>
@endif
<div class="form-group">
  {!! Form::label('image_comment', trans('forms.image_comment')) !!}
  {!! Form::text('image_comment', null, ['class' => 'form-control']) !!}
</div>
<div class="divider"></div>

<h2>{{ trans('panel.contact_details') }}</h2>
<div class="form-group">
  {!! Form::label('reporter[reporter_name]', trans('forms.name')) !!}
  {!! Form::text('reporter[reporter_name]', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('reporter[relationship]', trans('forms.relationship')) !!}
  {!! Form::text('reporter[relationship]', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('reporter[phone]', trans('forms.phone')) !!}
  {!! Form::text('reporter[phone]', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('reporter[alt_phone]', trans('forms.alt_phone')) !!}
  {!! Form::text('reporter[alt_phone]', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('reporter[email]', trans('forms.email')) !!}
  {!! Form::text('reporter[email]', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('reporter[alt_contact]', trans('forms.alt_contact')) !!}
  {!! Form::text('reporter[alt_contact]', null, ['class' => 'form-control']) !!}
</div>

<a href="{{ route('panel.people.index', $general_status) }}" class="btn btn-primary">
  <i class="material-icons">arrow_back</i>
  {{ trans('panel.people') }}
</a>
<button type="submit" class="btn btn-success">
  <i class="material-icons">{{ $submitButtonIcon }}</i>
  {{ $submitButtonText }}
</button>