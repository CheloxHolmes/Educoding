<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Aprueba extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aprueba', function (Blueprint $table) {
            $table->bigInteger('idusuario')->unsigned()->index()->nullable();
            $table->foreign('idusuario')->references('id')->on('usuario')->onDelete('cascade');
            $table->bigInteger('idimagen')->unsigned()->index()->nullable();
            $table->foreign('idimagen')->references('idimagen')->on('imagen')->onDelete('cascade');
            $table->datetime('fecha_aprueba')->nullable();
            $table->string('justificacion')->nullable();
            $table->integer('esaprobado')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aprueba');
    }
}
