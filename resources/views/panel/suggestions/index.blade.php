@extends ('layouts.panel')

@section ('content')
<div class="container" id="suggestion-controller">
  <div class="center">
    <a class="btn btn-success center" href="{{ route('panel.suggestions.create') }}">
      <i class="material-icons">add</i>
      {{ trans('panel.new_model_female', ['model' => trans('panel.suggestion')]) }}
    </a>
  </div>
  @if ($suggestions->count() > 0)
    <table class="table table-striped">
      <thead>
        <td>{{ trans('forms.description') }}</td>
        <td class="right">{{ trans('panel.actions') }}</td>
      </thead>
      <tbody>
        @foreach ($suggestions as $suggestion)
          <tr>
            @if (strlen($suggestion->description) > 35)
              <td>{{ substr($suggestion->description, 0, 30) }}...</td>
            @else
              <td>{{ $suggestion->description }}</td>
            @endif
            <td class="right">
              <a class="btn btn-primary btn-responsive" href="{{ route('panel.suggestions.show', $suggestion->id) }}">
                <i class="material-icons">visibility</i>
                {{ trans('panel.view') }}
              </a>
              <a class="btn btn-success btn-responsive" href="{{ route('panel.suggestions.edit', $suggestion->id) }}">
                <i class="material-icons">edit</i>
                {{ trans('panel.edit') }}
              </a>
              {!! Form::open(['route' => ['panel.suggestions.destroy', $suggestion->id], 'method' => 'delete', 'class' => 'inline-form', 'onsubmit' => 'return confirmAction("'.trans('panel.sure_delete').'")']) !!}
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
    <p class="no-results">{{ trans('panel.no_results', ['controller' => trans('panel.suggestions')]) }}</p>
  @endif
  @include ('panel.layouts.show-footer', ['registers' => $suggestions, 'model' => 'suggestions', 'are_deleted_registers' => $are_deleted_registers])
</div>
@endsection