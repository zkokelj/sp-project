<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consumption extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [
      'car_id',
      'liters',
      'kilometers',
      'created_at',
      'updated_at'
    ];

    public function carOwner(){
      return $this->belongsTo('App\UsrCar', 'car_id');
    }


}
