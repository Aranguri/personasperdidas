<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Person extends Model
{
  use SoftDeletes;

  protected $guarded = [
    'id', 'updated_at', 'deleted_at'
  ];

  protected $dates = ['deleted_at'];

  public function reporter()
  {
    return $this->hasOne('App\Reporter');
  }

  public function comments()
  {
    return $this->hasMany('App\Comment');
  }

  public function contributions()
  {
    return $this->hasMany('App\Contribution');
  }

  public function country()
  {
    return $this->belongsTo('App\Country');
  }

  public function province()
  {
    return $this->belongsTo('App\Province')->has('country');
  }

  public function scopeAllByName($query)
  {
    return $query->orderBy('name', 'asc')->get();
  }

  public function scopeSearch($query, $search, $province_id, $country_id)
  {
    return $query->where('name', 'like', '%' . $search . '%')
      ->orWhere('surname', 'like', '%' . $search . '%')
      ->orWhere('area', 'like', '%' . $search . '%')
      ->orWhere('address', 'like', '%' . $search . '%')
      ->orWhere('characteristics', 'like', '%' . $search . '%')
      ->orWhere('province_id', '=', $province_id)
      ->orWhere('country_id', '=', $country_id);
  }
}
