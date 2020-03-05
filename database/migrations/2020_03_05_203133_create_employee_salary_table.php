<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeSalaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_salary', function (Blueprint $table) {
            $table->increments('id');         
            $table->integer('employee_id')->unsigned();
            $table->foreign('employee_id')->references('id')->on('employee');
            $table->string('salario');
            $table->string('impuestos');
            $table->string('salud');
            $table->string('pension');
            $table->string('valor_prima');           
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
        Schema::dropIfExists('employee_salary');
    }
}
