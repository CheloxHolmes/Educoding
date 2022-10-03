<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AsignaReimAlumno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asigna_reim_alumno', function (Blueprint $table) {
            $table->string('sesion_id')->primary()->unique();
            $table->bigInteger('usuario_id')->unsigned()->index();
            $table->foreign('usuario_id')->references('id')->on('usuario')->onDelete('cascade');
            $table->integer('periodo_id')->unsigned()->index()->unique();
            $table->foreign('periodo_id')->references('id')->on('periodo')->onDelete('cascade');
            $table->bigInteger('reim_id')->unsigned()->index()->unique();
            $table->foreign('reim_id')->references('id')->on('reim')->onDelete('cascade');
            $table->datetime('datetime_inicio')->nullable();
            $table->datetime('datetime_termino')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asigna_reim_alumno');
    }
}
