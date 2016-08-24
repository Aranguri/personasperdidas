<?php

return [
  // Common fields
  'name' => 'Nombre',
  'surname' => 'Apellido',
  'nickname' => 'Sobrenombre',
  'password' => 'Contraseña',
  'password_confirmation' => 'Confirmar contraseña',
  'hierarchy' => 'Jerarquía',
  'description' => 'Descripción',
  'age' => 'Edad',
  'gender' => 'Género',
  'characteristics' => 'Características',
  'clothes' => 'Vestimentas',
  'diseases' => 'Enfermedades',
  'observations' => 'Observations',
  'map' => 'Mapa',
  'comment' => 'Comentario',
  'username' => 'Nombre de usuario',
  'others' => 'Otros',

  // Contact details
  'email' => 'E-Mail',
  'public_email' => 'E-Mail público (va a ser mostrado en la web)',
  'private_email' => 'E-Mail privado (va a recibir las alertas de reportes y aportes)',
  'phone' => 'Teléfono',
  'relationship' => 'Relación',
  'alt_phone' => 'Teléfono alternativo',
  'alt_contact' => 'Contacto alternativo',

  // Gender
  'man' => 'Hombre',
  'woman' => 'Mujer',
  'other' => 'Otro',

  // Location
  'area' => 'Zona',
  'address' => 'Dirección',
  'country' => 'País',
  'province' => 'Provincia',
  'latitude' => 'Latitud',
  'longitude' => 'Longitud',

  // Image
  'image' => 'Imagen',
  'image_comment' => 'Commentario acerca de la imagen',
  'image_not_found' => 'No hay una imagen cargada',

  // Date
  'date' => 'Fecha',
  'missing_at' => 'Fecha de extravío',
  'found_at' => 'Fecha de encuentro',
  'last_seen' => 'Última vez visto',
  'closure_at' => 'Fecha de cierre',
  'created_at' => 'Fecha de creación',
  'updated_at' => 'Fecha de actualización',
  'deleted_at' => 'Fecha de eliminación',
  'year' => 'Año',
  'month' => 'Mes',
  'day' => 'Día',
  'birth_year' => 'Edad',
  'date_not_found' => 'No hay fecha',

  // Actions
  'save' => 'Guardar',
  'add' => 'Agregar',
  'search' => 'Buscar',
  'send' => 'Enviar',
  'subscribe' => 'Suscribirse',
  'unsubscribe' => 'Desuscribirse',
  'continue' => 'Continuar',
  'login' => 'Entrar',

  // Hierarchies
  'general_access' => 'Acceso general',
  'people_access' => 'Acceso a modificación de información de personas',
  'country_access' => 'Acceso a modificación de información de personas de un país en específico',
  'province_access' => 'Acceso a modificación de información de personas de una provincia en específico',
  'view_access' => 'Acceso para solo ver, sin editar',

  // Status
  'status' => 'Estado',

  // People's type singular
  'missing_to_validate' => 'Perdido a validar',
  'found_to_validate' => 'Encontrado a validar',
  'missing' => 'Perdido',
  'found' => 'Encontrado',
  'missing_found_with_life' => 'Perdido encontrado con vida',
  'missing_found_without_life' => 'Perdido encontrado sin vida',
  'found_refound' => 'Encontrado reencontrado',
  'closed' => 'Cerrado',
  'deleted' => 'Eliminado',
  'finished' => 'Finalizado',

  // People's type plural
  'missing_to_validate_plural' => 'Perdidos a validar',
  'found_to_validate_plural' => 'Encontrados a validar',
  'missing_plural' => 'Perdidos',
  'found_plural' => 'Encontrados',
  'missing_found_with_life_plural' => 'Perdidos encontrados con vida',
  'missing_found_without_life_plural' => 'Perdidos encontrados sin vida',
  'found_refound_plural' => 'Encontrados reencontrados',
  'closed_plural' => 'Cerrados',
  'deleted_plural' => 'Eliminados',
  'finished_plural' => 'Finalizados',

  // People's type plural female
  'missing_to_validate_plural_female' => 'Perdidas a validar',
  'found_to_validate_plural_female' => 'Encontradas a validar',
  'missing_plural_female' => 'Perdidas',
  'found_plural_female' => 'Encontradas',
  'missing_found_with_life_plural_female' => 'Perdidas encontradas con vida',
  'missing_found_without_life_plural_female' => 'Perdidas encontradas sin vida',
  'found_refound_plural_female' => 'Encontradas reencontradas',
  'closed_plural_female' => 'Cerradas',
  'deleted_plural_female' => 'Eliminadas',
  'finished_plural_female' => 'Finalizadas',

  // Field's type
  'required' => ':field (requerido)',
  'optional' => ':field (opcional)',
  'select_one' => 'Seleccionar un :field',

  // Social networks
  'facebook_name' => 'Nombre de la página de Facebook',
  'twitter_name' => 'Nombre de la cuenta de Twitter',
  'instagram_name' => 'Nombre de la cuenta de Instagram',

  // Home specific forms
  'home' => [
    'age' => 'Edad aproximada que el / ella tendría hoy',
    'characteristics' => 'Características físicas (altura aproximada, físico, color de pelo y de ojos, tez, etc.)',
    'clothes' => 'Cómo estaba el / ella vestido/a?',
    'has_disease' => 'Marcar si el / ella tenía una enfermedad',
    'diseases' => 'Que enfermedades?',
    'observations' => 'Otras observaciones',
    'name_surname' => 'Nombre y apellido',
    'phone' => 'Número de teléfono, incluyendo número de área',
    'alt_phone' => 'Número de teléfono alternativo, incluyendo número de área',
  ],

  // Others
  'web' => 'Web',
  'same_email' => 'Marcar si querés usar el mismo E-Mail que el público',
  'paginate_number' => 'Número de paginación',
  'remember_me' => 'Recordarme',

  // Errors
  'error_message' => 'Algún campo requerido está vacío',
  'many_errors_message' => 'Algunos campos requeridos están vacíos.',
  'email_error_message' => 'El E-Mail es inválido',
  'description_error_message' => 'La descripción es requerida',
];
