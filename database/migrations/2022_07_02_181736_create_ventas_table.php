<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->integer('vendedor');
            $table->integer('cliente');
            $table->integer('tipo');
            $table->integer('cant_productos')->nullable();
            $table->double('sub_total',8,2)->nullable();
            $table->double('descuento',8,2)->nullable();
            $table->double('itbis',8,2)->nullable();
            $table->double('total',8,2)->nullable();
            $table->double('total_sin_itbis',8,2)->nullable();
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
        Schema::dropIfExists('ventas');
    }
}
