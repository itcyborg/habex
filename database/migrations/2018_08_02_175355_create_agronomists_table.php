<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgronomistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agronomists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sirname');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('position');
            $table->string('zone');
            $table->string('email')->unique();
            $table->string('idnumber');
            $table->string('mobilenumber');
//            $table->string('paymentoption');
//            $table->text('accountname');
//            $table->integer('accountnumber');
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
        Schema::dropIfExists('agronomists');
    }
}
