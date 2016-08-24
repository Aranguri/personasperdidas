<div class="form-group">
  {!! Form::label('email', trans('forms.required', ['field' => trans('forms.email')])) !!}
  {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<a href="{{ route('panel.subscribers.index') }}" class="btn btn-primary">
  <i class="material-icons">arrow_back</i>
  {{ trans('panel.subscribers') }}
</a>

<button type="submit" class="btn btn-success">
  <i class="material-icons">{{ $submitButtonIcon }}</i>
  {{ $submitButtonText }}
</button>