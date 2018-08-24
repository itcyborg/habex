<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('county');
            $table->string('constituency');
            $table->integer('farmer_id');
            $table->string('ward');
            $table->string('location');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('elevation');
            $table->string('seedlingsPlanted');
            $table->double('farmSize');
            $table->integer('agronomistID')->nullable();// assign an agronomist
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('farms');
    }
}
