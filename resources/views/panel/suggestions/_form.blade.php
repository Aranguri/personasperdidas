<div class="form-group">
  {!! Form::label('email', trans('forms.email')) !!}
  {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('description', trans('forms.required', ['field' => trans('forms.description')])) !!}
  {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<a class="btn btn-primary" href="{{ route('panel.suggestions.index') }}">
  <i class="material-icons">arrow_back</i>
  {{ trans('panel.suggestions') }}
</a>

<button class="btn btn-success" type="submit">
  <i class="material-icons">{{ $submitButtonIcon }}</i>
  {{ $submitButtonText }}
</button>