<div class="form-group">
  {!! Form::label('name', trans('forms.required', ['field' => trans('forms.name')])) !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<a href="{{ route('panel.countries.index') }}" class="btn btn-primary">
  <i class="material-icons">arrow_back</i>
  {{ trans('panel.countries') }}
</a>

<button type="submit" class="btn btn-success">
  <i class="material-icons">{{ $submitButtonIcon }}</i>
  {{ $submitButtonText }}
</button>