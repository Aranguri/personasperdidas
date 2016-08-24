@extends ('layouts.panel')

@section ('content')
<div class="container" id="country-controller">
  <div class="center">
    <a class="btn btn-success center" href="{{ route('panel.countries.create') }}">
      <i class="material-icons">add</i>
      {{ trans('panel.new_model_male', ['model' => trans('panel.country')]) }}
    </a>
  </div>
  @if ($countries->count() > 0)
    <table class="table table-striped">
      <thead>
        <td>{{ trans('forms.name') }}</td>
        <td class="right">{{ trans('panel.actions') }}</td>
      </thead>
      <tbody>
        @foreach ($countries as $country)
          <tr>
            <td>{{ $country->name }}</td>
            <td class="right">
              <a class="btn btn-primary btn-responsive" href="{{ route('panel.countries.show', $country->id) }}">
                <i class="material-icons">visibility</i>
                {{ trans('panel.view') }}
              </a>
              <a class="btn btn-success btn-responsive" href="{{ route('panel.countries.edit', $country->id) }}">
                <i class="material-icons">edit</i>
                {{ trans('panel.edit') }}
              </a>
              {!! Form::open(['route' => ['panel.countries.destroy', $country->id], 'method' => 'delete', 'class' => 'inline-form', 'onsubmit' => 'return confirmAction("'.trans('panel.sure_delete').'")']) !!}
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
    <p class="no-results">{{ trans('panel.no_results', ['controller' => trans('panel.countries')]) }}</p>
  @endif
  @include ('panel.layouts.show-footer', ['registers' => $countries, 'model' => 'countries', 'are_deleted_registers' => $are_deleted_registers])
</div>
@endsection