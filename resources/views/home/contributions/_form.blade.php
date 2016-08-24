<h2>{{ trans('home.details') }}</h2>
<div class="field field-group">
  {!! Form::textarea('characteristics', null, ['placeholder' => trans('forms.required', ['field' => trans('forms.home.characteristics')]), 'size' => '50x3']) !!}
</div>
<div class="field field-group">
  {!! Form::text('clothes', null, ['placeholder' => trans('forms.home.clothes')]) !!}
</div>
<div class="field field-group">
  {!! Form::text('observations', null, ['placeholder' => trans('forms.home.observations')]) !!}
</div>
<div class="field field-group">
  {!! Form::file('image', ['class' => 'input-file']) !!}
</div>

<h2>{{ trans('home.location') }}</h2>
@if (getenv('LOCATION_MODE') == 'countries')
  <div class="field field-group">
    {!! Form::select('country_id', $countries, null, ['placeholder' => trans('forms.required', ['field' => trans('forms.select_one', ['field' => trans('panel.country')])]), 'onchange' => 'changeProvinceSelect("' . $provinces_for_each_country . '")']) !!}
  </div>
@endif
<div class="field field-group" id="province-select">
  {!! Form::select('province_id', $provinces, null, ['placeholder' => trans('forms.required', ['field' => trans('forms.select_one', ['field' => trans('panel.province')])])]) !!}
</div>
<div class="field field-group">
  {!! Form::text('area', null, ['placeholder' => trans('forms.area')]) !!}
</div>
<div class="field field-group">
  {!! Form::text('address', null, ['placeholder' => trans('forms.address')]) !!}
</div>

<h2>{{ trans('home.date') }}</h2>
<div class="field field-group">
  {!! Form::select('year', $years, null, ['id' => 'year', 'onchange' => 'updateDays("' . trans('forms.select_one', ['field' => trans('forms.day')]) . '")', 'placeholder' => trans('forms.select_one', ['field' => trans('forms.year')])]) !!}
</div>
<div class="field field-group">
  {!! Form::select('month', $months, null, ['id' => 'month', 'onchange' => 'updateDays("'. trans('forms.select_one', ['field' => trans('forms.day')]) .'")', 'placeholder' => trans('forms.select_one', ['field' => trans('forms.month')])]) !!}
</div>
<div class="field">
  {!! Form::select('day', [], null, ['id' => 'day', 'placeholder' => trans('forms.select_one', ['field' => trans('forms.day')])]) !!}
</div>

<h2>{{ trans('home.contact_data') }}</h2>
<div class="field field-group">
  {!! Form::text('contributor[name]', null, ['placeholder' => trans('forms.required', ['field' => trans('forms.name')])]) !!}
</div>
<div class="field field-group">
  {!! Form::text('contributor[phone]', null, ['placeholder' => trans('forms.required', ['field' => trans('forms.phone')])]) !!}
</div>
<div class="field field-group">
  {!! Form::text('contributor[email]', null, ['placeholder' => trans('forms.email')]) !!}
</div>

<a class="ui blue button" id="send-contribution-button" href="#" onclick="sendContribution('{{ trans('forms.error_message') }}', '{{ trans('forms.many_errors_message') }}');">
  {{ trans('forms.send') }}
</a>