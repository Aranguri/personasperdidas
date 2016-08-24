<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Person;

class CompatibilityController extends Controller
{
  public function index()
  {
    return redirect()->route('home.people.index');
  }

  public function page($uri, Request $request = null)
  {
    switch ($uri) {
      case 'index.php':
        return redirect()->route('home.people.index');
        break;
      case 'encontradas.php':
        return redirect()->route('home.people.index', 'looking_for_their_families');
        break;
      case 'queHacer.php':
        return redirect()->route('home.recommendations');
        break;
      case 'reportar.php':
        return redirect()->route('home.people.create');
        break;
      case 'contacto.php':
        return redirect()->route('home.suggestion.create');
        break;
      case 'colaboradores.php':
        return redirect()->route('home.collaborators');
        break;
      case 'suscribirse.php':
        return redirect()->route('home.subscribers.subscribe');
        break;
      case 'masInfo.php':
        $previous_id = $request->input('persona');
        $person = Person::where('previous_id', $previous_id)->first();
        if ($person) {
          return redirect(personUrl($person));
        }
        break;
      case 'panel':
        return redirect()->route('panel.index');
        break;
    }
    return redirect()->route('home.people.index');
  }

  public function panelPage($uri, Request $request)
  {
    switch ($uri) {
      case 'index.php':
        return redirect()->route('panel.people.index', 'missing_to_validate');
        break;
      case 'validarEncontradas.php':
        return redirect()->route('panel.people.index', 'found_to_validate');
        break;
      case 'perdidas.php':
        return redirect()->route('panel.people.index', 'missing');
        break;
      case 'encontradas.php':
        return redirect()->route('panel.people.index', 'found');
        break;
      case 'cerrados.php':
        return redirect()->route('panel.people.index', 'closed');
        break;
      case 'mails.php':
        return redirect()->route('panel.subscribers.index');
        break;
      case 'estadisticas.php':
        return redirect()->route('panel.stats.index');
        break;
      case 'masInfoPersona.php':
        $previous_id = $request->input('persona');
        $person = Person::where('previous_id', $previous_id)->first();
        if ($person) {
          return redirect()->route('panel.people.show', $person->id);
        }
        break;
    }
    return redirect()->route('panel.index');
  }
}
