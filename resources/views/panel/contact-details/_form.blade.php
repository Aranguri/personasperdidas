<h2>{{ trans('panel.contact_information') }}</h2>

<div class="form-group">
  {!! Form::label('phone', trans('forms.phone')) !!}
  {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('public_email', trans('forms.required', ['field' => trans('forms.public_email')])) !!}
  {!! Form::text('public_email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('private_email', trans('forms.required', ['field' => trans('forms.private_email')])) !!}
  <div id="same-email-container">
    {!! Form::checkbox('same_email', null, null, ['id' => 'same-email-input', 'onclick' => 'toggleSameEmail()']) !!}
    {!! Form::label('same_email', trans('forms.same_email'), ['id' => 'same-email-label']) !!}
  </div>
  {!! Form::text('private_email', null, ['class' => 'form-control']) !!}
</div>
<div class="divider"></div>


<h2>{{ trans('panel.social_networks') }}</h2>

<div class="form-group">
  {!! Form::label('facebook', trans('forms.facebook_name')) !!}
  <div class="input-group">
    <span class="input-group-addon" id="fb-addon">https://facebook.com/</span>
    {!! Form::text('facebook', null, ['class' => 'form-control', 'aria-describedby' => 'fb-addon']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('twitter', trans('forms.twitter_name')) !!}
  <div class="input-group">
    <span class="input-group-addon" id="tw-addon">https://twitter.com/</span>
    {!! Form::text('twitter', null, ['class' => 'form-control', 'aria-describedby' => 'tw-addon']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('instagram', trans('forms.instagram_name')) !!}
  <div class="input-group">
    <span class="input-group-addon" id="instagram-addon">https://instagram.com/</span>
    {!! Form::text('instagram', null, ['class' => 'form-control', 'aria-describedby' => 'insta-addon']) !!}
  </div>
</div>

<a href="{{ route('panel.contact-details.index') }}" class="btn btn-primary">
  <i class="material-icons">arrow_back</i>
  {{ trans('panel.contact_details') }}
</a>

<button type="submit" class="btn btn-success">
  <i class="material-icons">{{ $submitButtonIcon }}</i>
  {{ $submitButtonText }}
</button>