<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastos', function (Blueprint $table) {
            $table->id();
            $table->integer('proveedor_id')->nullable();
            $table->string('ncf')->nullable();
            $table->date('fecha')->nullable();
            $table->date('fecha_vencimiento')->nullable();
            $table->double('sub_total',8,2)->nullable();
            $table->double('descuento',8,2)->nullable();
            $table->double('total',8,2)->nullable();
            $table->integer('creado_por')->nullable();
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
        Schema::dropIfExists('gastos');
    }
}
