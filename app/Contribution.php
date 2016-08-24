<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contribution extends Model
{
  use SoftDeletes;

  protected $guarded = [
    'id', 'created_at', 'updated_at', 'deleted_at'
  ];

  protected $dates = ['deleted_at'];

  public function contributor()
  {
    return $this->hasOne('App\Contributor');
  }

  public function person()
  {
    return $this->belongsTo('App\Person');
  }

  public function country()
  {
    return $this->belongsTo('App\Country');
  }

  public function province()
  {
    return $this->belongsTo('App\Province');
  }
}
