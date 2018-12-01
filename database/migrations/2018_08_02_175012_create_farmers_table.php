<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('sirname');
            $table->string('email')->nullable();
            $table->string('idnumber');
            $table->string('mobilenumber');
            $table->text('passport')->nullable();
            $table->text('contractform')->nullable();
            $table->text('idfront')->nullable();
            $table->text('idback')->nullable();
            $table->string('farmerscode')->unique();
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
        Schema::dropIfExists('farmers');
    }
}
