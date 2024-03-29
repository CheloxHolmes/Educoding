<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mensajes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->id()->nullable()->autoIncrement();
            $table->bigInteger('id_creador')->unsigned()->index()->nullable();
            $table->foreign('id_creador')->references('id')->on('usuario')->onDelete('cascade');
            $table->bigInteger('id_receptor')->unsigned()->index()->nullable();
            $table->foreign('id_receptor')->references('id')->on('usuario')->onDelete('cascade');
            $table->string('titulo');
            $table->longText('descripcion');
            $table->datetime('fecha_mensaje');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mensajes');
    }
}
