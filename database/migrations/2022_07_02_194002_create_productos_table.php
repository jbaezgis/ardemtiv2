<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('imagen', 2048)->nullable();
            $table->string('nombre')->nullable();
            $table->string('descripcion')->nullable();
            $table->double('precio',8,2)->nullable();
            $table->integer('categoria')->nullable();
            $table->boolean('estado')->default(1);
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
        Schema::dropIfExists('productos');
    }
}
