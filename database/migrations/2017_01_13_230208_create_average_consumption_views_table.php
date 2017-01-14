<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAverageConsumptionViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement( 'CREATE VIEW average_consumption AS
          SELECT car_id, SUM(liters)/(SUM(kilometers)/100) as avg_consumption FROM consumptions GROUP BY car_id;' );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         DB::statement( 'DROP VIEW average_consumption' );
    }
}
