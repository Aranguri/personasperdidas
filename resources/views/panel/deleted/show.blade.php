@extends ('layouts.panel')

@section ('content')
<div class="container">
  <h2>{{ trans('panel.all_information') }}</h2>
  @foreach ($register->getAttributes() as $key => $value)
    @if ($value && strpos($key, 'id') == false && $key != 'id')
      <h4>{{ trans('forms.' . $key) }}: {{ $value }}</h4>
    @endif
  @endforeach

  <h2>{{ trans('panel.actions') }}</h2>
  @if ($model == 'Person')
    <a href="{{ route('panel.deleted.people.index', $register->status) }}" class="btn btn-primary">
  @else
    <a href="{{ route('panel.deleted.index', $model_in_plural) }}" class="btn btn-primary">
  @endif
    <i class="material-icons">arrow_back</i>
    {{ trans('panel.deleted') }} {{ trans('panel.' . $model_in_plural) }}
  </a>
  @if ($model == 'Person')
    {!! Form::open(['route' => ['panel.deleted.restore', $model_in_plural, $register->id, $register->status], 'class' => 'inline-form', 'onsubmit' => 'return confirmAction("'.trans('panel.sure_restore').'")']) !!}
  @else
    {!! Form::open(['route' => ['panel.deleted.restore', $model_in_plural, $register->id], 'class' => 'inline-form', 'onsubmit' => 'return confirmAction("'.trans('panel.sure_restore').'")']) !!}
  @endif
    <button class="btn btn-default btn-responsive" type="submit">
      <i class="material-icons">replay</i>
      {{ trans('panel.restore') }}
    </button>
  {!! Form::close() !!}
  @if ($model == 'Person')
    {!! Form::open(['route' => ['panel.deleted.delete', $model_in_plural, $register->id, $register->status], 'method' => 'delete', 'class' => 'inline-form', 'onsubmit' => 'return confirmAction("'.trans('panel.sure_permanently_delete').'")']) !!}
  @else
    {!! Form::open(['route' => ['panel.deleted.delete', $model_in_plural, $register->id], 'method' => 'delete', 'class' => 'inline-form', 'onsubmit' => 'return confirmAction("'.trans('panel.sure_permanently_delete').'")']) !!}
  @endif
    <button class="btn btn-danger btn-responsive" type="submit">
      <i class="material-icons">delete</i>
      {{ trans('panel.permanently_delete') }}
    </button>
  {!! Form::close() !!}
</div>
@endsection