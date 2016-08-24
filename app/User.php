<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
  use SoftDeletes;

  protected $guarded = [
    'id', 'created_at', 'updated_at', 'deleted_at', 'remember_token'
  ];

  protected $dates = ['deleted_at'];

  protected $hidden = [
    'password', 'remember_token',
  ];

  public function comments()
  {
    return $this->hasMany('App\Comment');
  }

  public function province()
  {
    return $this->belongsTo('App\Province');
  }

  public function country()
  {
    return $this->belongsTo('App\Country');
  }
}
