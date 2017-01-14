<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/** Model for average_consumption view. View contains car_id and average_consumption for every distinct car_id.
*/
class AverageConsumptionView extends Model
{
    /**protected $table defines which table is for this Model.
     *
     */
    protected $table = 'average_consumption';
}
