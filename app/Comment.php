<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/** Class Comment extends Model. It contains $fillable and $timestamps variables
*   that define characteristics of this model.
*/
class Comment extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'to_user',
    'from_user',
    'comment',
    'created_at'
  ];

  /**
   * $timestamps are set to false, becase we use created_at field to store timestamps.
   */
  public $timestamps = false;
}
