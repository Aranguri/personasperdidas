<div class="ui large action input">
  {!! Form::text('email', $email, ['id' => 'subscriber-email', 'placeholder' => trans('forms.email')]) !!}
  <button class="ui large blue button" type="submit">
    {{ trans('forms.' . $button_action) }}
  </button>
</div>

