@extends ('layouts.home')

@section ('content')
<div class="ui container" id="recommendations-container">
  @if (config('app.locale') == 'es')
		<h1>¿Qué hacer en caso de pérdida de algún familiar?</h1>
		<h3>Reportar a la persona perdida en esta misma plataforma</h3>
		<h3>Llamar al 142 o al 0800-122-2442 (Atención al Ciudadano - Adultos Perdidos)</h3>
		<h3>Procedimiento a seguir por cada paso en especial:</h3>
		<div class="ui styled fluid accordion">
      <div class="title">
        <i class="dropdown icon"></i>
        Cómo y dónde hacer la denuncia
      </div>
      <div class="content">
        <p class="transition hidden">
          • Hacer la denuncia en la comisaría de la zona. Ninguna ley dice que debe esperarse 24 o 48 hs para que tomen la denuncia. Deben, además, informarle el juzgado o fiscalía que interviene. De no hacerlo, pida los datos del juzgado o fiscalía de turno.
          <br>
          • Llamar al COP (Centro de Orientación de Personas de la Policía Federal) (011) 4370-5920. Dejar registrados los datos de la persona perdida y dato de contacto de un familiar. Preguntar si registraron algún incidente en vía pública o tienen alguna persona no identificada (NN) hallada.
          <br>
          • Capital Federal: Llamar al SAME 107 preguntar si registraron algún incidente en la vía pública. Mail: same@buenosaires.gov.ar
          <br>
          • Buenos Aires: Contactar con la <a href="http://www.mseg.gba.gov.ar/desaparecidos/index.htm" target="_blank">Dirección General de Registro de Personas Desaparecidas</a> Dirección: Calle 55 Nº 930 2º piso. La Plata. Teléfono: (0221) 421-8972, 421-9940 y 0800-333-5502. Horario de atención: Lunes a viernes de 07 a 19 horas. Mail: perdes@mseg.gba.gov.ar
          <br>
          • San Juan: Consultar la <a href="http://personasperdidas.sanjuan.gov.ar/contacto.php" target="_blank">página</a> de Personas Perdidas de San Juan.
          <br>
          • Santa Fe: Contactar con la Secretaría de Derechos Humano. Saavedra 2059 en la ciudad de Santa Fe o Moreno 248 en la ciudad de Rosario, o llamar a 0800-555-3348.
        </p>
      </div>
      <div class="title">
        <i class="dropdown icon"></i>
        En caso de que la persona perdida tenga problemas psiquiátricos
      </div>
      <div class="content">
        <p class="transition hidden">
          • Si tiene algún trastorno psiquiátrico (como Alzheimer) buscar en los lugares que concurrían anteriormente o de los que hablaba habitualmente.
          <br>
          • Recurrir a los Neurosiquiátricos, personalmente y además intentar dejar alguna foto con datos de contacto en la guardia.
          <br>
          • Llamar al Registro de Búsqueda de Personas con Padecimientos Mentales de la Ciudad de Buenos Aires: (011) 4346-8900.
          <br>
          • Contactar con el Hospital Borda: (011) 4304-6038 / 4305-6666 o con el Hospital Melchor Romero: (0221) 478-0181 / 0182 / 5972 / 7194
        </p>
      </div>
      <div class="title">
        <i class="dropdown icon"></i>
        Si sospecha que su familiar puede estar en la calle (Buenos Aires)
      </div>
      <div class="content">
        <p class="transition hidden">
          • Llamar al 108 <a href="http://www.buenosaires.gov.ar/areas/des_social/atencion_inmediata/bap.php?menu_id=23347" target="_blank">(BAP – Buenos Aires Presente)</a>, ellos asisten a personas en situación de calle.
          <br>
          • Dejar foto en los Paradores de la Ciudad de Buenos Aires, también pedir permiso para entrar y buscar personalmente.
          <br>
          • Contactar con el <a href="http://www.buenosaires.gov.ar/areas/des_social/establecimientos/ficha.php?id=167" target="_blank">Parador de Retiro</a>: Gendarmería Nacional 522.
          <br>
          • Contactar con el <a href="http://www.buenosaires.gov.ar/areas/des_social/establecimientos/ficha.php?id=168" target="_blank">Parador de Parque Patricios</a>: Masantonio 2970.
          <br>
          • Contactar a los coordinadores de parroquias que todos los días llevan comida a la gente que no va a comedores y se encuentran durmiendo en las plazas.
        </p>
      </div>
      <div class="title">
        <i class="dropdown icon"></i>
        Fotos para carteles
      </div>
      <div class="content">
        <p class="transition hidden">
          • Pegar carteles con la foto en lugares cerca de donde se perdió el familiar: Plazas, kioscos de diarios, de flores, estaciones de trenes, terminales de colectivos, hospitales: guardia y oficina de servicio social. (Sugerimos colocar el teléfono de la comisaría, el juzgado, pero no un teléfono particular).<br>
          • Avisar a parientes y amigos, aunque ellos vivan lejos y no estén en contacto habitual.
        </p>
      </div>
    </div>
	@else
		<h1>¿Qué hacer en caso de pérdida de algún familiar?</h1>
		<h3>Reportar a la persona perdida en esta misma plataforma</h3>
		<h3>Llamar al 142 o al 0800-122-2442 (Atención al Ciudadano - Adultos Perdidos)</h3>
		<h3>Procedimiento a seguir por cada paso en especial:</h3>
		<div class="ui styled fluid accordion">
      <div class="title">
        <i class="dropdown icon"></i>
        Cómo y dónde hacer la denuncia
      </div>
      <div class="content">
        <p class="transition hidden">
          • Hacer la denuncia en la comisaría de la zona. Ninguna ley dice que debe esperarse 24 o 48 hs para que tomen la denuncia. Deben, además, informarle el juzgado o fiscalía que interviene. De no hacerlo, pida los datos del juzgado o fiscalía de turno.
          <br>
          • Llamar al COP (Centro de Orientación de Personas de la Policía Federal) (011) 4370-5920. Dejar registrados los datos de la persona perdida y dato de contacto de un familiar. Preguntar si registraron algún incidente en vía pública o tienen alguna persona no identificada (NN) hallada.
          <br>
          • Capital Federal: Llamar al SAME 107 preguntar si registraron algún incidente en la vía pública. Mail: same@buenosaires.gov.ar
          <br>
          • Buenos Aires: Contactar con la <a href="http://www.mseg.gba.gov.ar/desaparecidos/index.htm" target="_blank">Dirección General de Registro de Personas Desaparecidas</a> Dirección: Calle 55 Nº 930 2º piso. La Plata. Teléfono: (0221) 421-8972, 421-9940 y 0800-333-5502. Horario de atención: Lunes a viernes de 07 a 19 horas. Mail: perdes@mseg.gba.gov.ar
          <br>
          • San Juan: Consultar la <a href="http://personasperdidas.sanjuan.gov.ar/contacto.php" target="_blank">página</a> de Personas Perdidas de San Juan.
          <br>
          • Santa Fe: Contactar con la Secretaría de Derechos Humano. Saavedra 2059 en la ciudad de Santa Fe o Moreno 248 en la ciudad de Rosario, o llamar a 0800-555-3348.
        </p>
      </div>
      <div class="title">
        <i class="dropdown icon"></i>
        En caso de que la persona perdida tenga problemas psiquiátricos
      </div>
      <div class="content">
        <p class="transition hidden">
          • Si tiene algún trastorno psiquiátrico (como Alzheimer) buscar en los lugares que concurrían anteriormente o de los que hablaba habitualmente.
          <br>
          • Recurrir a los Neurosiquiátricos, personalmente y además intentar dejar alguna foto con datos de contacto en la guardia.
          <br>
          • Llamar al Registro de Búsqueda de Personas con Padecimientos Mentales de la Ciudad de Buenos Aires: (011) 4010-0300.
          <br>
          • Contactar con el Hospital Borda: (011) 4304-6038 / 4305-6666 o con el Hospital Melchor Romero: (0221) 478-0181 / 0182 / 5972 / 7194
        </p>
      </div>
      <div class="title">
        <i class="dropdown icon"></i>
        Si sospecha que su familiar puede estar en la calle (Buenos Aires)
      </div>
      <div class="content">
        <p class="transition hidden">
          • Llamar al 108 <a href="http://www.buenosaires.gov.ar/areas/des_social/atencion_inmediata/bap.php?menu_id=23347" target="_blank">(BAP – Buenos Aires Presente)</a>, ellos asisten a personas en situación de calle.
          <br>
          • Dejar foto en los Paradores de la Ciudad de Buenos Aires, también pedir permiso para entrar y buscar personalmente.
          <br>
          • Contactar con el <a href="http://www.buenosaires.gov.ar/areas/des_social/establecimientos/ficha.php?id=167" target="_blank">Parador de Retiro</a>: Gendarmería Nacional 522.
          <br>
          • Contactar con el <a href="http://www.buenosaires.gov.ar/areas/des_social/establecimientos/ficha.php?id=168" target="_blank">Parador de Parque Patricios</a>: Masantonio 2970.
          <br>
          • Contactar a los coordinadores de parroquias que todos los días llevan comida a la gente que no va a comedores y se encuentran durmiendo en las plazas.
        </p>
      </div>
      <div class="title">
        <i class="dropdown icon"></i>
        Fotos para carteles
      </div>
      <div class="content">
        <p class="transition hidden">
          • Pegar carteles con la foto en lugares cerca de donde se perdió el familiar: Plazas, kioscos de diarios, de flores, estaciones de trenes, terminales de colectivos, hospitales: guardia y oficina de servicio social. (Sugerimos colocar el teléfono de la comisaría, el juzgado, pero no un teléfono particular).<br>
          • Avisar a parientes y amigos, aunque ellos vivan lejos y no estén en contacto habitual.
        </p>
      </div>
    </div>
	@endif
</div>
@endsection

@section ('styles')
  <link rel="stylesheet" href="{{ includeAsset('css/home/accordion.min.css') }}"></link>
@endsection

@section ('scripts')
  <script type="text/javascript" src="{{ includeAsset('js/home/accordion.min.js') }}"></script>
  <script>
    $('.ui.accordion')
      .accordion()
    ;
  </script>
@endsection