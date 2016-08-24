<?php

return [

  /*
  |--------------------------------------------------------------------------
  | Validation Language Lines
  |--------------------------------------------------------------------------
  |
  | El campo following language lines contain El campo default error messages used by
  | El campo validator class. Some of El campose rules have multiple versions such
  | as El campo size rules. Feel free to tweak each of El campose messages here.
  |
  */

  'accepted'             => 'El campo :attribute tiene que ser aceptable.',
  'active_url'           => 'El campo :attribute no es una URL válida.',
  'after'                => 'El campo :attribute tiene que ser una fecha posterior a :date.',
  'alpha'                => 'El campo :attribute solo puede contener letras.',
  'alpha_dash'           => 'El campo :attribute solo puede contener letras, números y guiones medios.',
  'alpha_num'            => 'El campo :attribute solo puede contener letras y números.',
  'array'                => 'El campo :attribute tiene que ser un array.',
  'before'               => 'El campo :attribute tiene que ser una fecha anterior a :date.',
  'between'              => [
    'numeric' => 'El campo :attribute tiene que estar entre :min y :max.',
    'file'    => 'El campo :attribute tiene que estar entre :min y :max kilobytes.',
    'string'  => 'El campo :attribute tiene que estar entre :min y :max caracteres.',
    'array'   => 'El campo :attribute tiene que tener entre :min y :max items.',
  ],
  'boolean'              => 'El campo :attribute tiene que ser verdadero o falso.',
  'confirmed'            => 'El campo :attribute de confirmación no coincide.',
  'date'                 => 'El campo :attribute no es una fecha válida.',
  'date_format'          => 'El campo :attribute no se corresponde al formato :format.',
  'different'            => 'El campo :attribute y :other tienen que ser diferentes.',
  'digits'               => 'El campo :attribute tiene que tener :digits dígitos.',
  'digits_between'       => 'El campo :attribute tiene que tener entre :min y :max dígitos.',
  'distinct'             => 'El campo :attribute tiene un valor duplicado.',
  'email'                => 'El campo :attribute tiene que ser un E-Mail válido.',
  'exists'               => 'El campo :attribute seleccionado es inválido.',
  'filled'               => 'El campo :attribute es requerido.',
  'image'                => 'El campo :attribute tiene que ser una imagen.',
  'in'                   => 'El campo :attribute seleccionado es inválido.',
  'in_array'             => 'El campo :attribute no existe en :other.',
  'integer'              => 'El campo :attribute tiene que ser un entero.',
  'ip'                   => 'El campo :attribute tiene que ser una dirección IP válida.',
  'json'                 => 'El campo :attribute tiene que ser un JSON string válido.',
  'max'                  => [
    'numeric' => 'El campo :attribute no puede ser más grande que :max.',
    'file'    => 'El campo :attribute no puede tener más de :max kilobytes.',
    'string'  => 'El campo :attribute no puede tener más de :max caracteres.',
    'array'   => 'El campo :attribute no puede tener más de :max items.',
  ],
  'mimes'                => 'El campo :attribute tiene que ser un archivo del tipo: :values.',
  'min'                  => [
    'numeric' => 'El campo :attribute tiene que ser más grande que :min.',
    'file'    => 'El campo :attribute tiene que tener como mínimo :min kilobytes.',
    'string'  => 'El campo :attribute tiene que tener como mínimo :min caracteres.',
    'array'   => 'El campo :attribute tiene que tener como mínimo :min items.',
  ],
  'not_in'               => 'El campo :attribute seleccionado es inválido.',
  'numeric'              => 'El campo :attribute tiene que ser un número.',
  'present'              => 'El campo :attribute tiene que estar presente.',
  'regex'                => 'El formato del campo :attribute es inválido.',
  'required'             => 'El campo :attribute es requerido.',
  'required_if'          => 'El campo :attribute es requerido cuando :other es :value.',
  'required_unless'      => 'El campo :attribute es requerido a menos que :other sea :values.',
  'required_with'        => 'El campo :attribute es requerido cuando :values está presente.',
  'required_with_all'    => 'El campo :attribute es requerido cuando :values está presente.',
  'required_without'     => 'El campo :attribute es requerido cuando :values no está presente.',
  'required_without_all' => 'El campo :attribute es requerido cuando ninguno de los valores :values está presente.',
  'same'                 => 'El campo :attribute y :other tienen que coincidir.',
  'size'                 => [
    'numeric' => 'El campo :attribute tiene que ser :size.',
    'file'    => 'El campo :attribute tiene que tener :size kilobytes.',
    'string'  => 'El campo :attribute tiene que tener :size caracteres.',
    'array'   => 'El campo :attribute tiene que tener :size items.',
  ],
  'string'               => 'El campo :attribute tiene que ser un string.',
  'timezone'             => 'El campo :attribute tiene que tener una zona horaria válida.',
  'unique'               => 'El campo :attribute ya ha sido tomado, elegí otro.',
  'url'                  => 'El formato del campo :attribute es inválido.',

  /*
  |--------------------------------------------------------------------------
  | Custom Validation Language Lines
  |--------------------------------------------------------------------------
  |
  | Here you may specify custom validation messages for attributes using El campo
  | convention "attribute.rule" to name El campo lines. This makes it quick to
  | specify a specific custom language line for a given attribute rule.
  |
  */

  'custom' => [
    'missing_at' => [
      'required_if' => 'El campo Fecha de pérdida es requerido.',
    ],
    'found_at' => [
      'required_if' => 'El campo Fecha de encuentro es requerido.',
    ],
    'closure_at' => [
      'required_if' => 'El campo Fecha de cierre es requerido.',
    ],
    'country_id' => [
      'required_if_present' => 'El campo País es requerido.',
      'required_if' => 'El campo País es requerido.',
      'required' => 'El campo País es requerido.',
    ],
    'province_id' => [
      'required_if' => 'El campo Provincia es requerido.',
      'required' => 'El campo Provincia es requerido.',
    ],
    'facebook' => [
      'facebook_active_url' => 'El campo Facebook no es una nombre de cuenta válida.',
    ],
    'twitter' => [
      'twitter_active_url' => 'El campo Twitter no es una nombre de cuenta válida.',
    ],
    'instagram' => [
      'instagram_active_url' => 'El campo Instagram no es una nombre de cuenta válida.',
    ],
  ],

  /*
  |--------------------------------------------------------------------------
  | Custom Validation Attributes
  |--------------------------------------------------------------------------
  |
  | El campo following language lines are used to swap attribute place-holders
  | with something more reader friendly such as E-Mail Address instead
  | of "email". This simply helps us make messages a little cleaner.
  |
  */

  'attributes' => trans('forms'),

];
