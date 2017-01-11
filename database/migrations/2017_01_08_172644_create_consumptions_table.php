<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumptions', function (Blueprint $table) {
            $table->increments('id');
            //$table->integer('user_id');
            $table->integer('car_id')->unsigned();
            $table->foreign('car_id')->references('id')->on('usr_cars')->onDelete('cascade');
            $table->integer('liters');
            $table->integer('kilometers');
            $table->timestamps('time_added');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consumptions');
    }
}
