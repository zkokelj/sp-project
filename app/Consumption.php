<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * Consumption class extends Model. It contains $timestamps, $fillable variables that
 * define characteristics of this model. $timestamps is set to false and $fillable
 * is defines fields in table that can be assigned... It also contains carOwner function
 * that returns owner of a car.
 */
class Consumption extends Model
{
    /**
    * ... text2 ...
    */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'car_id',
      'liters',
      'kilometers',
      'created_at',
      'updated_at'
    ];
    /**
     * Function return owner of a car from UsrCar model.
     */
    public function carOwner(){
      return $this->belongsTo('App\UsrCar', 'car_id');
    }


}
