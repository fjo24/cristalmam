<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNovedadesTable extends Migration
{
    /**
     * Run the migrations.
     *'nombre', 'fecha', 'descripcion', 'contenido', 'seccion', 'orden', 'imagen1', 'imagen2', 'producto_id',
     * @return void
     */
    public function up()
    {
        Schema::create('novedades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->date('fecha');
            $table->text('descripcion')->nullable();
            $table->text('contenido')->nullable();
            $table->string('imagen')->nullable();
            $table->string('orden');
            $table->integer('categoria_novedad_id')->unsigned()->nullable();
            $table->foreign('categoria_novedad_id')->references('id')->on('categoria_novedades')->onDelete('cascade');
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
        Schema::dropIfExists('novedades');
    }
}
