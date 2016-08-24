@extends ('layouts.panel')

@section ('content')
<div class="container">
  <h2>{{ trans('panel.general_information') }}</h2>
  @if ($contribution->characteristics)
    <h4>{{ trans('forms.characteristics') }}: {{ $contribution->characteristics }}</h4>
  @endif
  @if ($contribution->clothes)
    <h4>{{ trans('forms.clothes') }}: {{ $contribution->clothes }}</h4>
  @endif
  @if ($contribution->observations)
    <h4>{{ trans('forms.observations') }}: {{ $contribution->observations }}</h4>
  @endif
  @if ($contribution->found_at)
    <h4>{{ trans('forms.found_at') }}: {{ $contribution->found_at }}</h4>
  @endif
  <div class="divider"></div>

  <h2>{{ trans('panel.location') }}</h2>
  @if ($contribution->country)
    <h4>{{ trans('forms.country') }}: {{ $contribution->country->name }}</h4>
  @endif
  @if ($contribution->province)
    <h4>{{ trans('forms.province') }}: {{ $contribution->province->name }}</h4>
  @endif
  @if ($contribution->area)
    <h4>{{ trans('forms.area') }}: {{ $contribution->area }}</h4>
  @endif
  @if ($contribution->address)
    <h4>{{ trans('forms.address') }}: {{ $contribution->address }}</h4>
  @endif
  <div class="divider"></div>

  <h2 id="image-section">{{ trans('forms.image') }}</h2>
  @if (file_exists(public_path('/images/contributions/' . $contribution->id . '.jpg')))
    <img src="{{ url('/') }}/images/contributions/{{ $contribution->id }}.jpg" id="people-show-image">
    <a class="btn btn-info" data-toggle="modal" data-target="#upload-contribution-image-modal">
      <i class="material-icons">file_upload</i>
      {{ trans('panel.upload_new_image') }}
    </a>
    <a class="btn btn-primary" data-toggle="modal" data-target="#enlarge-contribution-image-modal">
      <i class="material-icons">zoom_out_map</i>
      {{ trans('panel.enlarge_image') }}
    </a>
    <div class="modal fade" id="enlarge-contribution-image-modal" tabindex="-1" role="dialog" aria-labelledby="enlarge-contribution-image-modal-label">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <a class="close" data-dismiss="modal">
              <i class="material-icons close-modal-button">close</i>
            </a>
            <h4 class="modal-title" id="enlarge-contribution-image-modal-label">{{ trans('forms.image') }}</h4>
          </div>
          <div class="modal-body">
            <img src="{{ url('/') }}/images/contributions/{{ $contribution->id }}.jpg" id="people-contributions-show-modal-image">
          </div>
          <div class="modal-footer">
            <a class="btn btn-default" data-dismiss="modal">
              {{ trans('panel.close') }}
            </a>
          </div>
        </div>
      </div>
    </div>
  @else
    <h4>{{ trans('forms.image_not_found') }}</h4>
    <a class="btn btn-success" data-toggle="modal" data-target="#upload-contribution-image-modal">
      <i class="material-icons">file_upload</i>
      {{ trans('panel.upload_image') }}
    </a>
  @endif
  <div class="modal fade" id="upload-contribution-image-modal" tabindex="-1" role="dialog" aria-labelledby="upload-contribution-image-modal-label">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <a class="close" data-dismiss="modal">
            <i class="material-icons close-modal-button">close</i>
          </a>
          <h4 class="modal-title" id="upload-contribution-image-modal-label">{{ trans('panel.upload_image') }}</h4>
        </div>
        {!! Form::open(['route' => ['panel.people.contributions.image.local', $contribution->id], 'files' => true]) !!}
          <div class="modal-body">
            <div class="form-group">
              {!! Form::label('image', trans('forms.image')) !!}
              {!! Form::file('image', ['class' => 'form-control']) !!}
            </div>
          </div>
          <div class="modal-footer">
            <a class="btn btn-default" data-dismiss="modal">
              {{ trans('panel.close') }}
            </a>
            <button type="submit" class="btn btn-primary">
              {{ trans('panel.submit') }}
            </button>
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  <div class="divider"></div>

  <h2>{{ trans('panel.contact_details') }}</h2>
  @if ($contribution->contributor->name)
    <h4>{{ trans('forms.name') }}: {{ $contribution->contributor->name }}</h4>
  @endif
  @if ($contribution->contributor->phone)
    <h4>{{ trans('forms.phone') }}: {{ $contribution->contributor->phone }}</h4>
  @endif
  @if ($contribution->contributor->email)
    <h4>{{ trans('forms.email') }}: {{ $contribution->contributor->email }}</h4>
  @endif
  <div class="divider"></div>

  <h2>{{ trans('panel.actions') }}</h2>
  <a href="{{ route('panel.people.show', $contribution->person->id) }}" class="btn btn-primary">
    <i class="material-icons">arrow_back</i>
    {{ trans('panel.persons_contribution') }}
  </a>
  <a href="{{ route('panel.people.contributions.edit', $contribution->id) }}" class="btn btn-success">
    <i class="material-icons">edit</i>
    {{ trans('panel.edit') }}
  </a>
  {!! Form::open(['route' => ['panel.people.contributions.destroy', $contribution->id], 'method' => 'delete', 'class' => 'inline-form', 'onsubmit' => 'return confirmAction("'.trans('panel.sure_delete').'")']) !!}
  <button class="btn btn-danger" type="submit">
    <i class="material-icons">delete</i>
    {{ trans('panel.delete') }}
  </button>
  {!! Form::close() !!}
</div>
@endsection