<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('nombre');
            $table->string('codigo')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('capacidad')->nullable();
            $table->text('meta_descripcion')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('orden')->nullable();
            $table->boolean('destacado')->default('0');
            $table->string('imagen_detalle')->nullable();
            $table->integer('categoria_id')->unsigned();

            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
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
