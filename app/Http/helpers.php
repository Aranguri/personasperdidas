<?php

use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

/* general */

function includeAsset($url)
{
  if ($_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
    return secure_asset($url);
  }
  else {
    return asset($url);
  }
}

function setActive($uri)
{
  if ($uri == 'missing' || $uri == 'found'){
    return Request::is('*/' . $uri) ? 'active' : '';
  }
  else if ($uri == 'finished'){
    $i = 0;
    foreach (Config::get('constants.status') as $status) {
      $i++;
      if (Request::is('*' . $status) && $i > 4){
        return 'active';
      }
    }
  }
  else {
    return Request::is('*' . $uri . '*') ? 'active' : '';
  }
}

function setActiveHome($uri)
{
  if ($uri == '/') {
    $active = Request::is('/') ? true : false;
  }
  else if ($uri == 'looking_for_their_families') {
    $active = Request::is('looking_for_their_families') ? true : false;
  }
  else if ($uri == 'recommendations'){
    $active = Request::is('recommendations') ? true : false;
  }
  else if ($uri == 'report'){
    $active = Request::is('report') ? true : false;
  }
  return ($active) ? 'active' : '';
}

function setHomeTitle()
{
  if (Request::is('/')) {
    $title = 'missing_people';
  }
  else if (Request::is('contributions/*')) {
    $title = 'contributions';
  }
  else if (preg_match('/[0-9]/', Request::path()[0])) {
    $title = 'missing_people';
  }
  else if (Request::is('report/*')) {
    $title = 'report';
  }
  else {
    $title = Request::path();
  }

  return $title;
}

function getName($person)
{
  if ($person->name && $person->surname) {
    $name = $person->name . ' ' . $person->surname;
  }
  else if ($person->name) {
    $name = $person->name;
  }
  else {
    $name = $person->surname;
  }

  return $name;
}

function normalizeChars($s) {
    $replace = array(
        'ъ'=>'-', 'Ь'=>'-', 'Ъ'=>'-', 'ь'=>'-',
        'Ă'=>'A', 'Ą'=>'A', 'À'=>'A', 'Ã'=>'A', 'Á'=>'A', 'Æ'=>'A', 'Â'=>'A', 'Å'=>'A', 'Ä'=>'Ae',
        'Þ'=>'B',
        'Ć'=>'C', 'ץ'=>'C', 'Ç'=>'C',
        'È'=>'E', 'Ę'=>'E', 'É'=>'E', 'Ë'=>'E', 'Ê'=>'E',
        'Ğ'=>'G',
        'İ'=>'I', 'Ï'=>'I', 'Î'=>'I', 'Í'=>'I', 'Ì'=>'I',
        'Ł'=>'L',
        'Ñ'=>'N', 'Ń'=>'N',
        'Ø'=>'O', 'Ó'=>'O', 'Ò'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'Oe',
        'Ş'=>'S', 'Ś'=>'S', 'Ș'=>'S', 'Š'=>'S',
        'Ț'=>'T',
        'Ù'=>'U', 'Û'=>'U', 'Ú'=>'U', 'Ü'=>'Ue',
        'Ý'=>'Y',
        'Ź'=>'Z', 'Ž'=>'Z', 'Ż'=>'Z',
        'â'=>'a', 'ǎ'=>'a', 'ą'=>'a', 'á'=>'a', 'ă'=>'a', 'ã'=>'a', 'Ǎ'=>'a', 'а'=>'a', 'А'=>'a', 'å'=>'a', 'à'=>'a', 'א'=>'a', 'Ǻ'=>'a', 'Ā'=>'a', 'ǻ'=>'a', 'ā'=>'a', 'ä'=>'ae', 'æ'=>'ae', 'Ǽ'=>'ae', 'ǽ'=>'ae',
        'б'=>'b', 'ב'=>'b', 'Б'=>'b', 'þ'=>'b',
        'ĉ'=>'c', 'Ĉ'=>'c', 'Ċ'=>'c', 'ć'=>'c', 'ç'=>'c', 'ц'=>'c', 'צ'=>'c', 'ċ'=>'c', 'Ц'=>'c', 'Č'=>'c', 'č'=>'c', 'Ч'=>'ch', 'ч'=>'ch',
        'ד'=>'d', 'ď'=>'d', 'Đ'=>'d', 'Ď'=>'d', 'đ'=>'d', 'д'=>'d', 'Д'=>'D', 'ð'=>'d',
        'є'=>'e', 'ע'=>'e', 'е'=>'e', 'Е'=>'e', 'Ə'=>'e', 'ę'=>'e', 'ĕ'=>'e', 'ē'=>'e', 'Ē'=>'e', 'Ė'=>'e', 'ė'=>'e', 'ě'=>'e', 'Ě'=>'e', 'Є'=>'e', 'Ĕ'=>'e', 'ê'=>'e', 'ə'=>'e', 'è'=>'e', 'ë'=>'e', 'é'=>'e',
        'ф'=>'f', 'ƒ'=>'f', 'Ф'=>'f',
        'ġ'=>'g', 'Ģ'=>'g', 'Ġ'=>'g', 'Ĝ'=>'g', 'Г'=>'g', 'г'=>'g', 'ĝ'=>'g', 'ğ'=>'g', 'ג'=>'g', 'Ґ'=>'g', 'ґ'=>'g', 'ģ'=>'g',
        'ח'=>'h', 'ħ'=>'h', 'Х'=>'h', 'Ħ'=>'h', 'Ĥ'=>'h', 'ĥ'=>'h', 'х'=>'h', 'ה'=>'h',
        'î'=>'i', 'ï'=>'i', 'í'=>'i', 'ì'=>'i', 'į'=>'i', 'ĭ'=>'i', 'ı'=>'i', 'Ĭ'=>'i', 'И'=>'i', 'ĩ'=>'i', 'ǐ'=>'i', 'Ĩ'=>'i', 'Ǐ'=>'i', 'и'=>'i', 'Į'=>'i', 'י'=>'i', 'Ї'=>'i', 'Ī'=>'i', 'І'=>'i', 'ї'=>'i', 'і'=>'i', 'ī'=>'i', 'ĳ'=>'ij', 'Ĳ'=>'ij',
        'й'=>'j', 'Й'=>'j', 'Ĵ'=>'j', 'ĵ'=>'j', 'я'=>'ja', 'Я'=>'ja', 'Э'=>'je', 'э'=>'je', 'ё'=>'jo', 'Ё'=>'jo', 'ю'=>'ju', 'Ю'=>'ju',
        'ĸ'=>'k', 'כ'=>'k', 'Ķ'=>'k', 'К'=>'k', 'к'=>'k', 'ķ'=>'k', 'ך'=>'k',
        'Ŀ'=>'l', 'ŀ'=>'l', 'Л'=>'l', 'ł'=>'l', 'ļ'=>'l', 'ĺ'=>'l', 'Ĺ'=>'l', 'Ļ'=>'l', 'л'=>'l', 'Ľ'=>'l', 'ľ'=>'l', 'ל'=>'l',
        'מ'=>'m', 'М'=>'m', 'ם'=>'m', 'м'=>'m',
        'ñ'=>'n', 'н'=>'n', 'Ņ'=>'n', 'ן'=>'n', 'ŋ'=>'n', 'נ'=>'n', 'Н'=>'n', 'ń'=>'n', 'Ŋ'=>'n', 'ņ'=>'n', 'ŉ'=>'n', 'Ň'=>'n', 'ň'=>'n',
        'о'=>'o', 'О'=>'o', 'ő'=>'o', 'õ'=>'o', 'ô'=>'o', 'Ő'=>'o', 'ŏ'=>'o', 'Ŏ'=>'o', 'Ō'=>'o', 'ō'=>'o', 'ø'=>'o', 'ǿ'=>'o', 'ǒ'=>'o', 'ò'=>'o', 'Ǿ'=>'o', 'Ǒ'=>'o', 'ơ'=>'o', 'ó'=>'o', 'Ơ'=>'o', 'œ'=>'oe', 'Œ'=>'oe', 'ö'=>'oe',
        'פ'=>'p', 'ף'=>'p', 'п'=>'p', 'П'=>'p',
        'ק'=>'q',
        'ŕ'=>'r', 'ř'=>'r', 'Ř'=>'r', 'ŗ'=>'r', 'Ŗ'=>'r', 'ר'=>'r', 'Ŕ'=>'r', 'Р'=>'r', 'р'=>'r',
        'ș'=>'s', 'с'=>'s', 'Ŝ'=>'s', 'š'=>'s', 'ś'=>'s', 'ס'=>'s', 'ş'=>'s', 'С'=>'s', 'ŝ'=>'s', 'Щ'=>'sch', 'щ'=>'sch', 'ш'=>'sh', 'Ш'=>'sh', 'ß'=>'ss',
        'т'=>'t', 'ט'=>'t', 'ŧ'=>'t', 'ת'=>'t', 'ť'=>'t', 'ţ'=>'t', 'Ţ'=>'t', 'Т'=>'t', 'ț'=>'t', 'Ŧ'=>'t', 'Ť'=>'t', '™'=>'tm',
        'ū'=>'u', 'у'=>'u', 'Ũ'=>'u', 'ũ'=>'u', 'Ư'=>'u', 'ư'=>'u', 'Ū'=>'u', 'Ǔ'=>'u', 'ų'=>'u', 'Ų'=>'u', 'ŭ'=>'u', 'Ŭ'=>'u', 'Ů'=>'u', 'ů'=>'u', 'ű'=>'u', 'Ű'=>'u', 'Ǖ'=>'u', 'ǔ'=>'u', 'Ǜ'=>'u', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'У'=>'u', 'ǚ'=>'u', 'ǜ'=>'u', 'Ǚ'=>'u', 'Ǘ'=>'u', 'ǖ'=>'u', 'ǘ'=>'u', 'ü'=>'ue',
        'в'=>'v', 'ו'=>'v', 'В'=>'v',
        'ש'=>'w', 'ŵ'=>'w', 'Ŵ'=>'w',
        'ы'=>'y', 'ŷ'=>'y', 'ý'=>'y', 'ÿ'=>'y', 'Ÿ'=>'y', 'Ŷ'=>'y',
        'Ы'=>'y', 'ž'=>'z', 'З'=>'z', 'з'=>'z', 'ź'=>'z', 'ז'=>'z', 'ż'=>'z', 'ſ'=>'z', 'Ж'=>'zh', 'ж'=>'zh'
    );
    return strtr($s, $replace);
}

/* images */

function saveImage($id, $type, $source, $url = null)
{
  if ($source == 'input') {
    $image = Image::make(Input::file('image'));
	}
	else if ($source == 'url'){
    $image = Image::make($url);
	}
	$sizes = [512, 256, 128, 64];
	$name = $id . '.jpg';
	$image->save('images/' . $type . '/' . $name);
	if ($type == 'people') {
  	for ($i = 0; $i < count($sizes); $i++){
  		$name = $id . '_' . $sizes[$i] . '.jpg';
  		$image->resize($sizes[$i], null, function ($constraint) {
  		    $constraint->aspectRatio();
  		});
  		$image->save('images/people/' . $name);
  	}
	}
	else if ($type == 'contributions') {
		$name = $id . '_' . $sizes[1] . '.jpg';
		$image->resize($sizes[1], null, function ($constraint) {
		    $constraint->aspectRatio();
		});
		$image->save('images/contributions/' . $name);
	}
	$name = $id . '_square.jpg';
	$image->fit(128);
	$image->save('images/' . $type . '/' . $name);
}

function deleteImages($id, $type)
{
  if ($type == 'people') {
    if (file_exists('images/people/' . $id . '.jpg')) {
      $sizes = [512, 256, 128, 64];
    	for ($i = 0; $i < count($sizes); $i++) {
        unlink('images/people/' . $id . '_' . $sizes[$i] . '.jpg');
    	}
      unlink('images/people/' . $id . '.jpg');
      unlink('images/people/' . $id . '_square.jpg');
    }
  }
}

/* general.dates */

function convertToCarbonDate($date)
{
  if ($date) {
    return Carbon::createFromFormat(config('app.date_format'), $date)->toDateString();
  }
  else{
    return null;
  }
}

function convertFromCarbonDate($date)
{
  if ($date) {
    return Carbon::parse($date)->format(config('app.date_format'));
  }
  else {
    return null;
  }
}

function dateFromSplit($year, $month, $day)
{
  if ($year == '0' || $year == '-1') {
    $year = null;
  }
  if ($month == '0' || $month == '-1') {
    $month = null;
  }
  if ($day == '0' || $day == '-1') {
    $day = null;
  }

  if ($year && $month && $day) {
    $date = Carbon::create($year, $month, $day);
  }
  else if ($year && $month) {
    $date = Carbon::create($year, $month, 1);
  }
  else if ($year) {
    $date = Carbon::create($year, 1, 1);
  }
  else {
    $date = null;
  }
  return $date;
}

function getYears()
{
  $years = [];
  for ($i = Carbon::today()->year; $i > 1975; $i--) {
    $years[$i] = $i;
  }
  return $years;
}

function getMonths()
{
  $months = [];
  for ($i = 1; $i <= 12; $i++) {
    $months[$i] = trans('home.months.' . $i);
  }
  return $months;
}


/* general.location */

function getLocation($model)
{
  $location = '';

  if ($model->address != null && $model->area != null && $model->province != null) {
    $location = $person->address . ', ' . $person->area . ', ' . $model->province->name;
  }
  else if ($model->area != null && $model->province != null) {
    $location = $model->area . ', ' . $model->province->name;
  }
  else if ($model->address != null && $model->province != null) {
    $location = $model->address . ', ' . $model->province->name;
  }
  else if ($model->address != null && $model->area != null) {
    $location = $model->address . ', ' . $model->area;
  }
  else if ($model->province != null) {
    $location = $model->province->name;
  }
  else if ($model->area != null) {
    $location = $model->area;
  }
  else if ($model->address != null) {
    $location = $model->address;
  }

  if (getenv('LOCATION_MODE') == 'countries') {
    if ($location) {
      $location .= ', ' . $model->country->name;
    }
    else {
      $location .= $model->country->name;
    }
  }

  return $location;
}

function getAreaProvince($person)
{
  if ($person->area && $person->province) {
    return $person->area . ', ' . $person->province->name;
  }
  else if ($person->area) {
    return $person->area;
  }
  else if ($person->province) {
    return $person->province->name;
  }
  else {
    return null;
  }
}


/* panel */

function setTitle()
{
  return trans('panel.' . Request::segment(2));
}

function hierarchyToText($hierarchy)
{
  switch($hierarchy){
    case 0:
      return trans('forms.general_access');
    case 1:
      return trans('forms.people_access');
    case 2:
      return trans('forms.country_access');
    case 3:
      return trans('forms.province_access');
    case 4:
      return trans('forms.view_access');
  }
}

function checkHierarchy($user, $person, $province = null)
{
  if ($province == null && $person != null) {
    $province = $person->province;
  }

  return ($user->hierarchy == 0 || $user->hierarchy == 1 || ($user->hierarchy == 2 && $user->country->id == $province->country->id) || ($user->hierarchy == 3 && $user->province->id == $province->id));
}

function provincesForEachCountry($countries)
{
  $provinces_for_each_country = [];
  $i = 0;
  foreach ($countries as $country) {
    $provinces_for_each_country[$i] = [];
    array_push($provinces_for_each_country[$i], $country->id);
    foreach ($country->provinces as $province) {
      array_push($provinces_for_each_country[$i], $province->id);
    }
    $i++;
  }
  return json_encode($provinces_for_each_country);
}


/* panel.deleted */

function makeClassFromModel($model)
{
  $aux = 'App\\' . $model;
  $class = new $aux();
  return $class;
}

function makeModelSingular($model)
{
  return ucfirst(str_singular($model));
}

function makeModePlural($model)
{
  return str_plural(lcfirst($model));
}


/* home */

function personUrl($person)
{
  if ($person->surname != null) {
    $name = $person->name . ' ' . $person->surname;
  }
  else {
    $name = $person->name;
  }
  return route('home.people.show', $person->id) . '-' . str_replace(' ', '-', $name);
}

/* status */

function statusFromUrlParameter($url_parameter) {
  if ($url_parameter == null) {
    $status = 'missing';
  }
  else if ($url_parameter == 'looking_for_their_families'){
    $status = 'found';
  }
  return $status;
}

function urlParameterFromStatus($status) {
  if ($status == 'missing') {
    $url_parameter = '';
  }
  else if ($status == 'found') {
    $url_parameter = 'looking_for_their_families';
  }
  return $url_parameter;
}

?>