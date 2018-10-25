<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoutingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scoutings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('farmid');
            $table->integer('died');
            $table->integer('surviving');
            $table->enum('statusOfTrees',['Poor','Good','Excellent']);
            $table->enum('watering',['Sufficient','Insufficient']);
            $table->text('fertilizerChemApp',['Manure','DAP','NPK','CAN']);
            $table->double('fertilizerAmountApp');
            $table->enum('fertilizerAppMeasurement',['KGS','gms']);
            $table->string('pestDisease');
            $table->enum('weeding',['Sufficient','Insufficient']);
            $table->double('intercropping');
            $table->double('PH');
            $table->double('EC');
            $table->text('observationsNotes');
            $table->date('assessmentDate');
            $table->integer('authorisedBy');
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
        Schema::dropIfExists('scoutings');
    }
}
