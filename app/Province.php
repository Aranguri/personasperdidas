<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
  use SoftDeletes;

  protected $guarded = [
    'id', 'created_at', 'updated_at', 'deleted_at'
  ];

  protected $dates = ['deleted_at'];

  public function users()
  {
    return $this->hasMany('App\User');
  }

  public function people()
  {
    return $this->hasMany('App\Person');
  }

  public function country()
  {
    return $this->belongsTo('App\Country');
  }

  public function scopeAllByName($query)
  {
    return $query->has('country')->orderBy('name')->get();
  }

  public function scopeSearch($query, $search)
  {
    return $query->where('name', 'like', '%' . $search . '%');
  }
}
