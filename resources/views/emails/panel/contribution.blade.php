@if (config('app.locale') == 'es')
  <h2>Recientemente se hizo una aporte a la persona {{ getName($person) }}</h2>
  <h2>Fecha del aporte: {{ $contribution->found_at }}</h2>
  <h2>Lugar del aporte: {{ getLocation($contribution) }}</h2>
  <h2>Para ver la ficha de la persona que contiene el aporte hace click <a href="{{ route('panel.people.show', $person->id) }}">acá</a></h2>
@else
@endif