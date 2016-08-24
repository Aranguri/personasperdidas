@extends ('layouts.panel')

@section ('content')
<div class="container" id="province-controller">
  <div class="center">
    <a class="btn btn-success center" href="{{ route('panel.provinces.create') }}">
      <i class="material-icons">add</i>
      {{ trans('panel.new_model_female', ['model' => trans('panel.province')]) }}
    </a>
  </div>
  @if ($provinces->count() > 0)
    <table class="table table-striped">
      <thead>
        <td>{{ trans('forms.name') }}</td>
        <td class="right">{{ trans('panel.actions') }}</td>
      </thead>
      <tbody>
        @foreach ($provinces as $province)
          <tr>
            <td>{{ $province->name }}</td>
            <td class="right">
              <a class="btn btn-primary btn-responsive" href="{{ route('panel.provinces.show', $province->id) }}">
                <i class="material-icons">visibility</i>
                {{ trans('panel.view') }}
              </a>
              <a class="btn btn-success btn-responsive" href="{{ route('panel.provinces.edit', $province->id) }}">
                <i class="material-icons">edit</i>
                {{ trans('panel.edit') }}
              </a>
              {!! Form::open(['route' => ['panel.provinces.destroy', $province->id], 'method' => 'delete', 'class' => 'inline-form', 'onsubmit' => 'return confirmAction("' . trans('panel.sure_delete') . '")']) !!}
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
    <p class="no-results">{{ trans('panel.no_results', ['controller' => trans('panel.provinces')]) }}</p>
  @endif
  @include ('panel.layouts.show-footer', ['registers' => $provinces, 'model' => 'provinces', 'are_deleted_registers' => $are_deleted_registers])
</div>
@endsection