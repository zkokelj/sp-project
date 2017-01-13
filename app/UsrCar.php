<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsrCar extends Model
{
    protected $fillable = [
      'id',
      'user_id',
      'manufacturer_id',
      'model',
      'year',
      'ccm',
      'fuel'

    ];
    public $timestamps = false;

    public function manufacturer(){
      return $this->belongsTo('App\CarManufacturer', 'manufacturer_id');
    }


}
