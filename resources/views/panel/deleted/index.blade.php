@extends ('layouts.panel')

@section ('content')
<div class="container" id="deleted-controller">
  @if ($model == 'Person')
    <a class="btn btn-primary" href="{{ route('panel.' . $model_in_plural . '.index', $status) }}">
  @else
    <?php $status = null ?>
    <a class="btn btn-primary" href="{{ route('panel.' . $model_in_plural . '.index') }}">
  @endif
    <i class="material-icons">arrow_back</i>
    {{ trans('panel.return_to', ['model_in_plural' => trans('panel.' . $model_in_plural)]) }}
  </a>
  @if ($registers->count() > 0)
    <table class="table table-striped">
      <thead>
        @if ($model == 'Subscriber')
          <td>{{ trans('forms.email') }}</td>
        @elseif ($model == 'Suggestion')
          <td>{{ trans('forms.description') }}</td>
        @else
          <td>{{ trans('forms.name') }}</td>
        @endif
        <td>{{ trans('forms.deleted_at') }}</td>
        <td class="right">{{ trans('panel.actions') }}</td>
      </thead>
      <tbody>
        @foreach ($registers as $register)
          <tr>
            @if ($model == 'Subscriber')
              <td>{{ $register->email }}</td>
            @elseif ($model == 'Suggestion')
              @if (strlen($register->description) > 35)
                <td>{{ substr($register->description, 0, 30) }}...</td>
              @else
                <td>{{ $register->description }}</td>
              @endif
            @else
              <td>{{ $register->name }}</td>
            @endif
            <td>{{ $register->deleted_at }}</td>
            <td class="right">
              <a class="btn btn-primary btn-responsive" href="{{ route('panel.deleted.show', [$model_in_plural, $register->id]) }}">
                <i class="material-icons">visibility</i>
                {{ trans('panel.view') }}
              </a>
              {!! Form::open(['route' => ['panel.deleted.restore', $model_in_plural, $register->id, $status], 'class' => 'inline-form', 'onsubmit' => 'return confirmAction("'.trans('panel.sure_restore').'")']) !!}
                <button class="btn btn-default btn-responsive" type="submit">
                  <i class="material-icons">replay</i>
                  {{ trans('panel.restore') }}
                </button>
              {!! Form::close() !!}
              {!! Form::open(['route' => ['panel.deleted.delete', $model_in_plural, $register->id, $status], 'method' => 'delete', 'class' => 'inline-form', 'onsubmit' => 'return confirmAction("'.trans('panel.sure_permanently_delete').'")']) !!}
                <button class="btn btn-danger btn-responsive" type="submit">
                  <i class="material-icons">delete</i>
                  {{ trans('panel.permanently_delete') }}
                </button>
              {!! Form::close() !!}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="center">
      {!! $registers->render() !!}
    </div>
  @else
    @if ($model == 'people' || $model == 'provinces' || $model == 'suggestions')
      <p class="no-results">{{ trans('panel.no_deleted_results_female', ['controller' => trans('panel.' . $model_in_plural)]) }}</p>
    @else
      <p class="no-results">{{ trans('panel.no_deleted_results_male', ['controller' => trans('panel.' . $model_in_plural)]) }}</p>
    @endif
  @endif
</div>
@endsection