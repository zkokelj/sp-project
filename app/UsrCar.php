<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * UsrCar class extends Model. It contains $fillable, $timestamps variables and
 * manufacturer(), cons() functions
 */
class UsrCar extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
    protected $fillable = [
      'id',
      'user_id',
      'manufacturer_id',
      'model',
      'year',
      'ccm',
      'fuel'

    ];
    /**
     * $timestamps variable is set to false
     */
     public $timestamps = false;
  /**
   *  manufacturer() funation return manufacturer of a car.
   */
    public function manufacturer(){
      return $this->belongsTo('App\CarManufacturer', 'manufacturer_id');
    }
    /**
     * cons() funation returns cosumptions for cars..
     */
    public function cons(){
      return $this->hasMany('App\Consumption', 'car_id');
    }




}
