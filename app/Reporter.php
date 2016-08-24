<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reporter extends Model
{
  protected $guarded = [
    'id',
  ];

  public function person()
  {
    return $this->belongsTo('App\Person');
  }

  public $timestamps = false;
}
