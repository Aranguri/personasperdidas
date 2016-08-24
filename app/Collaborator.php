<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collaborator extends Model
{
  use SoftDeletes;

  protected $guarded = [
    'id',
  ];

  protected $dates = ['deleted_at'];

  public $timestamps = false;
}
