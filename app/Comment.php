<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
  use SoftDeletes;

  protected $guarded = [
    'id', 'created_at', 'updated_at', 'deleted_at'
  ];

  protected $dates = ['deleted_at'];

  public function person()
  {
    return $this->belongsTo('App\Person');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
