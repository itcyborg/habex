<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint  $table) {
            $table->increments('id');
            $table->string('orderNo');
            $table->integer('itemNo');
            $table->string('description');
            $table->integer('quantity');
            $table->integer('unitCost');
            $table->double('total');
            $table->integer('farmerId');
            $table->date('dueDate');
            $table->double('tax');
            $table->string('status')->default('Pending');
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
        Schema::dropIfExists('orders');
    }
}
