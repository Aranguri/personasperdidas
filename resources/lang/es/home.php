<?php

return [
  // sections
  'missing' => 'Personas perdidas',
  'looking_for_their_families' => 'Buscan a sus familiares',
  'report' => 'Reportar una persona',

  // footer.titles
  'social_networks' => 'Redes sociales',
  'contact_details' => 'Detalles de contacto',
  'subscribe_for_alerts_of_missing_people' => 'Suscribirse para alertas de personas perdidas',

  // footer.links
  'collaborators' => 'Colaboradores',
  'send_feedback' => 'Enviar sugerencia',
  'developers' => 'Desarolladores',
  'privacy' => 'Privacidad',
  'terms' => 'Términos',

  // social networks
  'share' => 'Compartir',
  'facebook' => 'Facebook',
  'twitter' => 'Twitter',
  'instagram' => 'Instagram',
  'tweet' => [
    'title' => 'Twittear',
    'missing' => [
      'hashtag' => 'BuscamosA:name',
      'looking_for' => 'Estamos buscando a :name :surname.',
      'location' => 'Última vez visto :area_province.',
      'location_man' => 'Última vez visto :area_province.',
      'location_other' => 'Última vez visto :area_province.',
      'location_woman' => 'Última vez vista :area_province.',
    ],
    'found' => [
      'hashtag' => 'BuscamosAFamiliaresDe:name',
      'looking_for' => 'Estamos buscando a familiares de :name :surname.',
      'location' => 'Encontrado en :area_province.',
      'location_man' => 'Encontrado en :area_province.',
      'location_other' => 'Encontrado en :area_province.',
      'location_woman' => 'Encontrada en :area_province.',
    ],
    'help_diffusion' => 'Ayuda en la difusión!',
  ],

  // developers
  'developers_title' => 'Desarolladores',
  'developers_subtitle' => 'Si querés ayudar en el desarollo de la plataforma, o usar la plataforma en tu pais, por favor dejá tu E-Mail.',

  // people.index
  'missing_people' => 'Personas perdidas',
  'more_details' => 'Más detalles',
  'previous' => 'Anterior',
  'next' => 'Siguiente',

  // people.show
  'send_contribution' => 'Sé algo acerca de :name',
  'person' => [
    'seen' => 'visto',
    'seen_man' => 'visto',
    'seen_other' => 'visto',
    'seen_woman' => 'vista',

    'found' => 'encontrado',
    'found_man' => 'encontrado',
    'found_other' => 'encontrado',
    'found_woman' => 'encontrada',

    'title_missing' => 'Estamos buscando a :name :surname',
    'description_missing' => ':name :surname se perdió. La ultima vez que fue :seen estaba en :address, el :date. ¡Necesitamos tu ayuda para difundir!',
    'title_found' => 'Estamos buscando a familiares de :name :surname',
    'description_found' => ':name :surname fue :found en :address, el :date. ¡Necesitamos tu ayuda para difundir!',
  ],
  'return_to_home' => 'Volver a personas :model',

  'description' => [
    'article' => 'El',
    'article_man' => 'El',
    'article_other' => 'El',
    'article_woman' => 'Ella',

    'seen_man' => 'visto',
    'seen_other' => 'visto',
    'seen_woman' => 'vista',

    'missing_man' => 'perdido',
    'missing_other' => 'perdido',
    'missing_woman' => 'perdida',

    'found_man' => 'encontrado',
    'found_other' => 'encontrado',
    'found_woman' => 'encontrada',

    'name_surname_missing' => ':name :surname está :missing. ',
    'name_surname_found' => 'Estamos buscando a familiares de :name :surname. ',
    'name_missing' => ':name está :missing. ',
    'name_found' => 'Estamos buscando a familiares de :name. ',
    'surname_missing' => ':surname está :missing. ',
    'surname_found' => 'Estamos buscando a familiares de :surname. ',

    'date_location_missing' => 'Fue :seen por última vez el :date, en :location. ',
    'date_location_found' => 'Fue :founded el :date, en :location. ',
    'date_missing' => 'Fue :seen por última vez el :date. ',
    'date_found' => 'Fue :found el :date. ',
    'location_missing' => 'Fue :seen por última vez en :location. ',
    'location_found' => 'Fue :found en :location. ',

    'age' => 'Tiene :age años.',

    'diseases' => 'Está bajo tratamiento médico.'
  ],

  // people.showForPrint
  'print' => [
    'title' => 'Imprimir',
    'name_surname_missing' => 'Estamos buscando a :name :surname',
    'name_surname_found' => 'Estamos buscando a familiares de :name :surname',
    'name_missing' => 'Estamos buscando a :name',
    'name_found' => 'Estamos buscando a familiares de :name',
    'surname_missing' => 'Estamos buscando a :surname',
    'surname_found' => 'Estamos buscando a familiares de :surname',
    'more_information' => 'Más información en nuestra página web o redes sociales',
    'organization_title' => 'Personas Perdidas - Red Solidaria',
  ],

  // people.create
  'status_title' => 'La persona que estás reportando está:',
  'step' => 'Paso :step',
  'steps' => [
    '1' => 'Llena los campos que sepás acerca de la persona que estás reportando como :status',
    '2' => 'Adjunta una imagen de la persona :status que estás reportando',
    '3' => 'Llena los campos con la ubicación aproximada o exacta de donde la persona :status fue visto / vista por última vez',
    '4' => 'Llena los campos con la fecha aproximada o exacta de donde la persona :status fue visto / vista por última vez',
    '5' => 'Más detalles de la persona :status',
    '6' => 'Información de contacto tuya',
  ],
  'here' => 'acá',
  'successful_report' => 'Reporte exitoso',
  'successful_report_messages' => [
    '1' => 'El formulario ha sido enviado correctamente.',
    '2' => 'Pronto, una persona de nuestra red, te contactará para continuar el proceso.',
    '3' => 'Mientras te sugerimos leer nuestras recomendaciones',
  ],

  // people.contributions
  'contributions' => 'Aportes',
  'contributions_title' => 'Llena los campos con la inforomación que sepás acerca de :name',
  'successful_contribution' => 'Aporte exitoso',
  'successful_contribution_messages' => [
    '1' => 'El aporte ha sido enviado correctamente.',
    '2' => 'Gracias por el aporte, va a ser revisado pronto.',
    '3' => 'Continuar viendo información de :name',
  ],
  'details' => 'Detalles',
  'location' => 'Dónde?',
  'date' => 'Cuándo?',
  'contact_data' => 'Datos de contacto',

  // others
  'months' => [
    '1' => 'Enero',
    '2' => 'Febrero',
    '3' => 'Marzo',
    '4' => 'Abril',
    '5' => 'Mayo',
    '6' => 'Junio',
    '7' => 'Julio',
    '8' => 'Agosto',
    '9' => 'Septiembre',
    '10' => 'Octubre',
    '11' => 'Noviembre',
    '12' => 'Diciembre',
  ],

  // suggestions
  'suggestion_title' => 'Enviamos tus opiniones y sugerencias acerca de la web',
  'successful_suggestion' => 'Sugerencia exitosa',
  'successful_suggestion_message' => 'Tu sugerencia ha sido enviada correctamentehas y va a ser revisada pronto. Gracias!',

  // subscribers
  'subscribe_title' => 'Suscribirse a los anuncios de las personas perdidas',
  'successful_subscribe' => 'Suscripción exitosa',
  'successful_subscribe_message' => [
    '1' => 'Tu E-Mail ha sido guardado exitosamente.',
    '2' => 'A partir de ahora vas a recibir las alertas de personas perdidas y encontradas',
  ],

  'unsubscribe_title' => 'Escribí tu E-Mail para desuscribirte',
  'successful_unsubscribe' => 'Desuscripción exitosa',
  'successful_unsubscribe_message' => [
    '1' => 'Tu E-Mail ha sido removido exitosamente.',
    '2' => 'Si querés suscribirte de nuevo cliqueá',
  ],

  // recommendations
  'recommendations' => '¿Qué hacer?',
];