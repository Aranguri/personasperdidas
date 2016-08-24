<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
  use SoftDeletes;

  protected $guarded = [
    'id', 'created_at', 'updated_at', 'deleted_at'
  ];

  protected $dates = ['deleted_at'];

  public function people()
  {
    return $this->hasMany('App\Person');
  }

  public function provinces()
  {
    return $this->hasMany('App\Province');
  }

  public function users()
  {
    return $this->hasMany('App\User');
  }

  public function scopeSearch($query, $search)
  {
    return $query->where('name', 'like', '%' . $search . '%');
  }
}
