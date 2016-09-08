@extends ('layouts.panel', ['user' => $user])

@section ('content')
<div class="container">
  <h2>{{ trans('panel.general_information') }}</h2>
  <h4><b>{{ trans('forms.status') }}:</b> {{ trans('forms.' . $person->status) }}</h4>
  <h4><b>{{ trans('forms.name') }}:</b> {{ $person->name }} {{ $person->surname }}</h4>
  @if ($person->nickname)
    <h4><b>{{ trans('forms.nickname') }}:</b> {{ $person->nickname }}</h4>
  @endif
  @if ($person->birth_year)
    <h4><b>{{ trans('forms.age') }}:</b> {{ $person->birth_year }}</h4>
  @endif
  @if ($person->characteristics)
    <h4><b>{{ trans('forms.characteristics') }}:</b> {{ $person->characteristics }}</h4>
  @endif
  @if ($person->gender)
    <h4><b>{{ trans('forms.gender') }}:</b> {{ trans('forms.' . $person->gender) }}</h4>
  @endif
  @if ($person->missing_at)
    <h4><b>{{ trans('forms.missing_at') }}:</b> {{ $person->missing_at }}</h4>
  @endif
  @if ($person->found_at)
    <h4><b>{{ trans('forms.found_at') }}:</b> {{ $person->found_at }}</h4>
  @endif
  @if ($person->closure_at)
    <h4><b>{{ trans('forms.closure_at') }}:</b> {{ $person->closure_at }}</h4>
  @endif
  <div class="divider"></div>

  <h2>{{ trans('panel.location') }}</h2>
  @if ($person->country)
    <h4><b>{{ trans('forms.country') }}:</b> {{ $person->country->name }}</h4>
  @endif
  @if ($person->province)
    <h4><b>{{ trans('forms.province') }}:</b> {{ $person->province->name }}</h4>
  @endif
  @if ($person->area)
    <h4><b>{{ trans('forms.area') }}:</b> {{ $person->area }}</h4>
  @endif
  @if ($person->address)
    <h4><b>{{ trans('forms.address') }}:</b> {{ $person->address }}</h4>
  @endif
  @if ($person->latitude || $person->longitude)
    <h4><b>{{ trans('forms.map') }}</b></h4>
    <div id="map" class="show-map"></div>
    <a class="btn btn-success btn-responsive" href="{{ route('panel.people.location.edit', $person->id) }}">
      <i class="material-icons">edit</i>
      {{ trans('panel.edit_location') }}
    </a>
    <a class="btn btn-primary btn-responsive" data-toggle="modal" data-target="#enlarge-map-modal" onclick="initMap('modal', {{ $person->latitude }}, {{ $person->longitude }});">
      <i class="material-icons">zoom_out_map</i>
      {{ trans('panel.enlarge_map') }}
    </a>
    <div class="modal fade bs-example-modal-lg" id="enlarge-map-modal" tabindex="-1" role="dialog" aria-labelledby="enlarge-map-modal-label">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <a class="close" data-dismiss="modal">
              <i class="material-icons close-modal-button">close</i>
            </a>
            <h4 class="modal-title" id="enlarge-map-modal-label">{{ trans('forms.map') }}</h4>
          </div>
          <div class="modal-body">
            <div id="modal-map"></div>
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
    <a href="{{ route('panel.people.location.edit', $person->id) }}" class="btn btn-success">
      <i class="material-icons">place</i>
      {{ trans('panel.get_location') }}
    </a>
  @endif
  <div class="divider"></div>

  @if ($person->clothes || $person->diseases || $person->observations)
    <h2>{{ trans('panel.more_information') }}</h2>
    @if ($person->clothes)
      <h4><b>{{ trans('forms.clothes') }}:</b> {{ $person->clothes }}</h4>
    @endif
    @if ($person->diseases)
      <h4><b>{{ trans('forms.diseases') }}:</b> {{ $person->diseases }}</h4>
    @endif
    @if ($person->observations)
      <h4><b>{{ trans('forms.observations') }}:</b> {{ $person->observations }}</h4>
    @endif
    <div class="divider"></div>
  @endif

  @if ($person->reporter->reporter_name || $person->reporter->relationship || $person->reporter->phone || $person->reporter->alt_phone || $person->reporter->email || $person->reporter->alt_contact)
    <h2>{{ trans('panel.contact_details') }}</h2>
    @if ($person->reporter->reporter_name)
      <h4><b>{{ trans('forms.name') }}:</b> {{ $person->reporter->reporter_name }}</h4>
    @endif
    @if ($person->reporter->relationship)
      <h4><b>{{ trans('forms.relationship') }}:</b> {{ $person->reporter->relationship }}</h4>
    @endif
    @if ($person->reporter->phone)
      <h4><b>{{ trans('forms.phone') }}:</b> {{ $person->reporter->phone }}</h4>
    @endif
    @if ($person->reporter->alt_phone)
      <h4><b>{{ trans('forms.alt_phone') }}:</b> {{ $person->reporter->alt_phone }}</h4>
    @endif
    @if ($person->reporter->email)
      <h4><b>{{ trans('forms.email') }}:</b> {{ $person->reporter->email }}</h4>
    @endif
    @if ($person->reporter->alt_contact)
      <h4><b>{{ trans('forms.alt_contact') }}:</b> {{ $person->reporter->alt_contact }}</h4>
    @endif
    <div class="divider"></div>
  @endif

  <h2 id="image-section">{{ trans('forms.image') }}</h2>
  <?php $file_headers = @get_headers(url('/') . '/images/people/' . $person->id . '_256.jpg') ?>
  @if ($file_headers && $file_headers[0] != 'HTTP/1.1 404 Not Found')
    <img src="{{ url('/') }}/images/people/{{ $person->id }}_256.jpg?{{ uniqid() }}" id="people-show-image">
    <a class="btn btn-success btn-responsive" onclick="return launchEditor('people-show-image', '{{ url('/') }}/images/people/{{ $person->id }}_256.jpg?{{ uniqid() }}');">
      <i class="material-icons">edit</i>
      {{ trans('panel.edit_image') }}
    </a>
    <a class="btn btn-info btn-responsive" data-toggle="modal" data-target="#upload-image-modal">
      <i class="material-icons">file_upload</i>
      {{ trans('panel.upload_new_image') }}
    </a>
    <a class="btn btn-primary btn-responsive" data-toggle="modal" data-target="#enlarge-image-modal">
      <i class="material-icons">zoom_out_map</i>
      {{ trans('panel.enlarge_image') }}
    </a>
    <div class="modal fade" id="enlarge-image-modal" tabindex="-1" role="dialog" aria-labelledby="enlarge-image-modal-label">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <a class="close" data-dismiss="modal">
              <i class="material-icons close-modal-button">close</i>
            </a>
            <h4 class="modal-title" id="enlarge-image-modal-label">{{ trans('forms.image') }}</h4>
          </div>
          <div class="modal-body">
            <img src="{{ url('/') }}/images/people/{{ $person->id }}.jpg" id="people-show-modal-image">
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
    <a class="btn btn-success" data-toggle="modal" data-target="#upload-image-modal">
      <i class="material-icons">file_upload</i>
      {{ trans('panel.upload_image') }}
    </a>
  @endif
  <div class="modal fade" id="upload-image-modal" tabindex="-1" role="dialog" aria-labelledby="upload-image-modal-label">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <a class="close" data-dismiss="modal">
            <i class="material-icons close-modal-button">close</i>
          </a>
          <h4 class="modal-title" id="upload-image-modal-label">{{ trans('panel.upload_image') }}</h4>
        </div>
        {!! Form::open(['route' => ['panel.people.image.local', $person->id], 'files' => true]) !!}
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
  @if ($person->image_comment)
    <h4><b>{{ trans('forms.image_comment') }}:</b> {{ $person->image_comment }}</h4>
  @endif
  <div class="divider"></div>

  <h2 id="tracking-section">{{ trans('panel.tracking_register') }}</h2>
  @if ($person->comments->count())
    <table class="table table-striped">
      <thead>
        <td>{{ trans('forms.description') }}</td>
        <td class="td-responsive">{{ trans('forms.username') }}</td>
        <td class="td-responsive">{{ trans('forms.updated_at') }}</td>
        <td class="td-responsive">{{ trans('forms.created_at') }}</td>
        <td>{{ trans('panel.edit') }}</td>
        <td>{{ trans('panel.delete') }}</td>
      </thead>
      <tbody>
        @foreach ($person->comments as $comment)
          <tr>
            <td>{{ $comment->description }}</td>
            <td class="td-responsive">{{ $comment->user->name }}</td>
            <td class="td-responsive">{{ Carbon\Carbon::parse($comment->updated_at)->setTimezone(config('app.timezone'))->format(config('app.date_format')) }}</td>
            <td class="td-responsive">{{ Carbon\Carbon::parse($comment->created_at)->setTimezone(config('app.timezone'))->format(config('app.date_format')) }}</td>
            <td>
              <a onclick="editComment('{{ $comment->id }}', '{{ $comment->description }}')" class="btn btn-success btn-responsive">
                <i class="material-icons">edit</i>
                {{ trans('panel.edit') }}
              </a>
            </td>
            <td>
              {!! Form::open(['route' => ['panel.people.comments.destroy', $comment->id], 'method' => 'delete', 'class' => 'inline-form', 'onsubmit' => 'return confirmAction("' . trans('panel.sure_permanently_delete') . '")']) !!}
              <button class="btn btn-danger btn-responsive" type="submit">
                <i class="material-icons">delete</i>
                {{ trans('panel.delete') }}
              </button>
              {!! Form::close() !!}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <h4>{{ trans('panel.no_results', ['controller' => trans('panel.comments')]) }}</h4>
  @endif
  {!! Form::open(['route' => ['panel.people.comments', $person->id], 'id' => 'comment-form']) !!}
    <div class="input-group">
      <span class="input-group-addon">{{ trans('forms.comment') }}</span>
      {!! Form::text('description', null, ['class' => 'form-control']) !!}
      <span class="span-submit-comment">
        <button type="submit" class="btn btn-success btn-responsive button-inline-field">
            <i class="material-icons">add</i>
            {{ trans('forms.add') }}
        </button>
      </span>
    </div>
  {!! Form::close() !!}
  {!! Form::open(['route' => ['panel.people.comments.edit', $person->id], 'class' => 'no-display', 'id' => 'edit-comment-form']) !!}
    <div class="input-group">
      <span class="input-group-addon">{{ trans('panel.edit_comment') }}</span>
      {!! Form::text('edit_comment_description', null, ['class' => 'form-control', 'id' => 'edit-comment-description']) !!}
      <span class="span-submit-comment">
        <button type="submit" class="btn btn-success btn-responsive button-inline-field">
          <i class="material-icons">save</i>
          {{ trans('forms.save') }}
        </button>
      </span>
    </div>
    {!! Form::text('edit_comment_id', null, ['class' => 'no-display', 'id' => 'edit-comment-id']) !!}
  {!! Form::close() !!}
  <div class="divider"></div>

  <h2 id="users-contributions">{{ trans('panel.user_contributions') }}</h2>
  @if ($person->contributions->count())
    <table class="table table-striped">
      <thead>
        <td>{{ trans('forms.address') }}</td>
        <td>{{ trans('forms.date') }}</td>
        <td>{{ trans('panel.view') }}</td>
        <td>{{ trans('panel.edit') }}</td>
        <td>{{ trans('panel.delete') }}</td>
      </thead>
      <tbody>
        @foreach ($person->contributions as $contribution)
          <tr>
            <td>{{ getLocation($contribution) }}</td>
            <td>{{ $contribution->found_at }}</td>
            <td>
              <a class="btn btn-primary" href="{{ route('panel.people.contributions.show', $contribution->id) }}">
                <i class="material-icons">visibility</i>
                {{ trans('panel.view') }}
              </a>
            </td>
            <td>
              <a class="btn btn-success" href="{{ route('panel.people.contributions.edit', $contribution->id) }}">
                <i class="material-icons">edit</i>
                {{ trans('panel.edit') }}
              </a>
            </td>
            <td>
              {!! Form::open(['route' => ['panel.people.contributions.destroy', $contribution->id], 'method' => 'delete', 'class' => 'inline-form', 'onsubmit' => 'return confirmAction("'.trans('panel.sure_permanently_delete').'")']) !!}
                <button class="btn btn-danger" type="submit">
                  <i class="material-icons">delete</i>
                  {{ trans('panel.delete') }}
                </button>
              {!! Form::close() !!}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <h4>{{ trans('panel.no_results', ['controller' => trans('panel.contributions')]) }}</h4>
  @endif
  <div class="divider"></div>

  <h2>{{ trans('forms.status') }}</h2>
  @foreach (Config::get('constants.possible_status_from_status.' . $person->status) as $status)
    {!! Form::open(['route' => ['panel.people.update.status', $person->id, $status], 'class' => 'inline-form', 'onsubmit' => 'return confirmAction("'.trans('panel.sure_change', ['status' => trans('panel.status.' . $status)]).'")']) !!}
      <button class="btn btn-{{ Config::get('constants.button_data_from_status.' . $status) }} btn-status-update btn-all-width-responsive" type="submit">
        {{ trans('panel.status.' . $status) }}
      </button>
    {!! Form::close() !!}
  @endforeach
  <div class="divider"></div>

  <h2>{{ trans('panel.actions') }}</h2>
  <a class="btn btn-primary btn-responsive" href="{{ route('panel.people.index', $person->status) }}">
    <i class="material-icons">arrow_back</i>
    {{ trans('panel.people_back_button', ['status' => trans('forms.' . $person->status . '_plural_female')]) }}
  </a>
  <a class="btn btn-success" href="{{ route('panel.people.edit', $person->id) }}">
    <i class="material-icons">edit</i>
    {{ trans('panel.edit') }}
  </a>
  {!! Form::open(['route' => ['panel.people.destroy', $person->id], 'method' => 'delete', 'class' => 'inline-form', 'onsubmit' => 'return confirmAction("'.trans('panel.sure_delete').'")']) !!}
    <button class="btn btn-danger" type="submit">
      <i class="material-icons">delete</i>
      {{ trans('panel.delete') }}
    </button>
  {!! Form::close() !!}
@endsection

@section('scripts')
@if ($person->latitude || $person->longitude)
  <script>initMap('show', '{{ $person->latitude }}', '{{ $person->longitude }}');</script>
@endif
<script>
  var featherEditor = new Aviary.Feather({
    apiKey: 'fcdc1fd5-a324-4c04-8fbe-b02a7df7c970',
    language: 'en',
    onSave: function(imageID, newURL) {
      location.href = '{{ route("panel.people.image.external", ["id" => $person->id]) }}?url=' + encodeURIComponent(newURL);
      featherEditor.close();
    }
  });
</script>
@endsection