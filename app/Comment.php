<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $fillable = [
    'to_user',
    'from_user',
    'comment',
    'created_at'
  ];

  public $timestamps = false;
}
