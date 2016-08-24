<div class="report-step" id="step1">
  <h1>{{ trans('home.step', ['step' => 1]) }}</h1>
  <h3>{{ trans('home.steps.1', ['status' => $status]) }}</h3>
  <div class="field field-group">
    {!! Form::text('name', null, ['placeholder' => trans('forms.name')]) !!}
  </div>
  <div class="field field-group">
    {!! Form::text('surname', null, ['placeholder' => trans('forms.surname')]) !!}
  </div>
  <div class="field">
    {!! Form::text('nickname', null, ['placeholder' => trans('forms.optional', ['field' => trans('forms.nickname')])]) !!}
  </div>
  <div class="field field-group">
    {!! Form::number('birth_year', null, ['placeholder' => trans('forms.home.age')]) !!}
  </div>
  <div class="field field-group">
    {!! Form::textarea('characteristics', null, ['placeholder' => trans('forms.home.characteristics'), 'size' => '50x3']) !!}
  </div>
  <div class="field">
    {!! Form::select('gender', ['man' => trans('forms.man'), 'woman' => trans('forms.woman'), 'other' => trans('forms.other')], null, ['placeholder' => trans('forms.select_one', ['field' => trans('forms.gender')])]) !!}
  </div>
</div>
<div class="report-step no-display" id="step2">
  <h1>{{ trans('home.step', ['step' => 2]) }}</h1>
  <h3>{{ trans('home.steps.2', ['status' => $status]) }}</h3>
  <div class="field">
    {!! Form::file('image', ['class' => 'input-file']) !!}
  </div>
  <div class="field">
    {!! Form::text('image_comment', null, ['placeholder' => trans('forms.optional', ['field' => trans('forms.image_comment')])]) !!}
  </div>
</div>
<div class="report-step no-display" id="step3">
  <h1>{{ trans('home.step', ['step' => 3]) }}</h1>
  <h3>{{ trans('home.steps.3', ['status' => $status]) }}</h3>
  @if (getenv('LOCATION_MODE') == 'countries')
    <div class="field field-group">
      {!! Form::select('country_id', $countries, null, ['placeholder' => trans('forms.select_one', ['field' => trans('panel.country')]),'class' => 'form-control', 'onchange' => 'changeProvinceSelect("' . $provinces_for_each_country . '")']) !!}
    </div>
  @endif
  <div class="field field-group" id="province-select">
    {!! Form::select('province_id', $provinces, null, ['placeholder' => trans('forms.select_one', ['field' => trans('panel.province')]), 'class' => 'form-control']) !!}
  </div>
  <div class="field field-group">
    {!! Form::text('area', null, ['placeholder' => trans('forms.area')]) !!}
  </div>
  <div class="field">
    {!! Form::text('address', null, ['placeholder' => trans('forms.optional', ['field' => trans('forms.address')])]) !!}
  </div>
</div>
<div class="report-step no-display" id="step4">
  <h1>{{ trans('home.step', ['step' => 4]) }}</h1>
  <h3>{{ trans('home.steps.4', ['status' => $status]) }}</h3>
  <div class="field field-group">
    {!! Form::select('year', $years, null, ['id' => 'year', 'onchange' => 'updateDays("' . trans('forms.optional', ['field' => trans('forms.select_one', ['field' => trans('forms.day')])]) . '")', 'placeholder' => trans('forms.select_one', ['field' => trans('forms.year')])]) !!}
  </div>
  <div class="field field-group">
    {!! Form::select('month', $months, null, ['id' => 'month', 'onchange' => 'updateDays("'. trans('forms.optional', ['field' => trans('forms.select_one', ['field' => trans('forms.day')])]) .'")', 'placeholder' => trans('forms.select_one', ['field' => trans('forms.month')])]) !!}
  </div>
  <div class="field">
    {!! Form::select('day', [], null, ['id' => 'day', 'placeholder' => trans('forms.optional', ['field' => trans('forms.select_one', ['field' => trans('forms.day')])])]) !!}
  </div>
</div>
<div class="report-step no-display" id="step5">
  <h1>{{ trans('home.step', ['step' => 5]) }}</h1>
  <h3>{{ trans('home.steps.5', ['status' => $status]) }}</h3>
  <div class="field">
    {!! Form::textarea('clothes', null, ['placeholder' => trans('forms.optional', ['field' => trans('forms.clothes')]), 'size' => '50x3']) !!}
  </div>
  <div class="field">
    <div class="ui checkbox">
      {!! Form::checkbox('has_disease', null, false, ['id' => 'has_disease', 'onchange' => 'toggleInputDisease()']) !!}
      <label>{{ trans('forms.home.has_disease') }}</label>
    </div>
  </div>
  <div class="field no-display" id="field-disease">
    {!! Form::textarea('diseases', null, ['class' => 'checkbox', 'placeholder' => trans('forms.home.diseases'), 'size' => '50x3']) !!}
  </div>
  <div class="field">
    {!! Form::textarea('observations', null, ['placeholder' => trans('forms.optional', ['field' => trans('forms.home.observations')]), 'size' => '50x3']) !!}
  </div>
</div>
<div class="report-step no-display" id="step6">
  <h1>{{ trans('home.step', ['step' => 6]) }}</h1>
  <h3>{{ trans('home.steps.6', ['status' => $status]) }}</h3>
  <div class="field field-group">
    {!! Form::text('reporter[reporter_name]', null, ['placeholder' => trans('forms.home.name_surname')]) !!}
  </div>
  <div class="field">
    {!! Form::text('reporter[relationship]', null, ['placeholder' => trans('forms.relationship')]) !!}
  </div>
  <div class="field field-group">
    {!! Form::text('reporter[phone]', null, ['placeholder' => trans('forms.home.phone')]) !!}
  </div>
  <div class="field">
    {!! Form::text('reporter[alt_phone]', null, ['placeholder' => trans('forms.optional', ['field' => trans('forms.home.alt_phone')])]) !!}
  </div>
  <div class="field field-group">
    {!! Form::text('reporter[email]', null, ['placeholder' => trans('forms.email')]) !!}
  </div>
  <div class="field">
    {!! Form::text('reporter[alt_contact]', null, ['placeholder' => trans('forms.optional', ['field' => trans('forms.alt_contact')])]) !!}
  </div>
</div>
<a class="ui blue button" id="continue-button" onclick="nextStep('{{ trans('forms.error_message') }}', '{{ trans('forms.many_errors_message') }}', '{{ trans('home.email_error_message') }}')">
  {{ trans('forms.continue') }}
</a>