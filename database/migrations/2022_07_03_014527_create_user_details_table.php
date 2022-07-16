<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('cedula')->nullable();
            $table->string('celular')->nullable();
            $table->string('telefono')->nullable();
            $table->integer('municipio_id')->nullable();
            $table->string('direccion')->nullable();
            $table->double('salario',8,2)->nullable();
            $table->string('horario')->nullable();
            $table->date('inicio_laboral')->nullable();
            $table->date('fin_laboral')->nullable();
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
        Schema::dropIfExists('user_details');
    }
}
