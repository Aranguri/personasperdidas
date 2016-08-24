@extends ('layouts.panel')

@section ('content')
<div class="container" id="user-controller">
  <div class="center">
    <a class="btn btn-success center" href="{{ route('panel.users.create') }}">
      <i class="material-icons">add</i>
      {{ trans('panel.new_model_male', ['model' => trans('panel.user')]) }}
    </a>
  </div>
  @if ($users->count() > 0)
    <table class="table table-striped">
      <thead>
        <td>{{ trans('forms.name') }}</td>
        <td>{{ trans('forms.email') }}</td>
        <td class="right">{{ trans('panel.actions') }}</td>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td class="right">
              <a class="btn btn-primary btn-responsive" href="{{ route('panel.users.show', $user->id) }}">
                <i class="material-icons">visibility</i>
                {{ trans('panel.view') }}
              </a>
              <a class="btn btn-success btn-responsive" href="{{ route('panel.users.edit', $user->id) }}">
                <i class="material-icons">edit</i>
                {{ trans('panel.edit') }}
              </a>
              {!! Form::open(['route' => ['panel.users.destroy', $user->id], 'method' => 'delete', 'class' => 'inline-form', 'onsubmit' => 'return confirmAction("'.trans('panel.sure_delete').'")']) !!}
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
      <p class="no-results">{{ trans('panel.no_results', ['controller' => trans('panel.users')]) }}</p>
    @endif
    @include ('panel.layouts.show-footer', ['registers' => $users, 'model' => 'users', 'are_deleted_registers' => $are_deleted_registers])
</div>
@endsection