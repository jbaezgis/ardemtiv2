<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastoItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gasto_items', function (Blueprint $table) {
            $table->id();
            $table->integer('gasto_id')->nullable();
            $table->integer('concepto_id')->nullable();
            $table->double('precio',8,2)->nullable();
            $table->integer('cantidad')->nullable();
            $table->double('total',8,2)->nullable();
            $table->text('observaciones')->nullable();
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
        Schema::dropIfExists('gasto_items');
    }
}
