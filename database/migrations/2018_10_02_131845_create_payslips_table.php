<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayslipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payslips', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employeeid');
            $table->double('basicSalary');
            $table->text('month');
            $table->integer('year');
            $table->double('totalAllowances');
            $table->double('totalTaxableAllowances');
            $table->double('totalDeductions');
            $table->double('grossSalary');
            $table->double('netSalary');
            $table->integer('status');
            $table->integer('updatedby');
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
        Schema::dropIfExists('payslips');
    }
}
