<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contributor extends Model
{
  protected $guarded = [
    'id',
  ];

  public function contribution()
  {
    return $this->belongsTo('App\Contribution');
  }

  public $timestamps = false;
}
