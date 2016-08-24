@extends ('layouts.panel')

@section ('content')
<div class="container">
  @if ($contactDetail)
    <h2>{{ trans('panel.contact_information') }}</h2>
    @if ($contactDetail->phone)
      <h4>{{ trans('forms.phone') }}: {{ $contactDetail->phone }}</h4>
    @endif
    @if ($contactDetail->public_email)
      <h4>{{ trans('forms.public_email') }}: {{ $contactDetail->public_email }}</h4>
    @endif
    <h4>{{ trans('forms.private_email') }}: {{ $contactDetail->private_email }}</h4>
    <div class="divider"></div>

    @if ($contactDetail->facebook || $contactDetail->twitter || $contactDetail->instagram)
      <h2>{{ trans('panel.social_networks') }}</h2>
      @if ($contactDetail->facebook)
        <h4>{{ trans('forms.facebook_name') }}: <a href="https://facebook.com/{{ $contactDetail->facebook }}" target="_blank">https://facebook.com/{{ $contactDetail->facebook }}</a></h4>
      @endif
      @if ($contactDetail->twitter)
        <h4>{{ trans('forms.twitter_name') }}: <a href="https://twitter.com/{{ $contactDetail->twitter }}" target="_blank">https://twitter.com/{{ $contactDetail->twitter }}</a></h4>
      @endif
      @if ($contactDetail->instagram)
        <h4>{{ trans('forms.instagram_name') }}: <a href="https://instagram.com/{{ $contactDetail->instagram }}" target="_blank">https://instagram.com/{{ $contactDetail->instagram }}</a></h4>
      @endif
      <div class="divider"></div>
    @endif

    <h2>{{ trans('panel.actions') }}</h2>
    <a href="{{ route('panel.contact-details.edit', $contactDetail->id) }}" class="btn btn-success">
      <i class="material-icons">edit</i>
      {{ trans('panel.edit') }}
    </a>
  @else
    <div class="center">
      <p class="no-results">{{ trans('panel.no_contact_details') }}</p>
      <a class="btn btn-success center" href="{{ route('panel.contact-details.create') }}">
        <i class="material-icons">add</i>
        {{ trans('panel.new_model_male', ['model' => trans('panel.contact_details')]) }}
      </a>
    </div>
  @endif
</div>
@endsection