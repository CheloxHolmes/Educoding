<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlumnoRespuestaActividad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_respuesta_actividad', function (Blueprint $table) {
            $table->bigInteger('id_per')->unsigned()->index()->nullable();
            $table->foreign('id_per')->references('id')->on('usuario')->onDelete('cascade');
            $table->bigInteger('id_user')->unsigned()->index()->nullable();
            $table->foreign('id_user')->references('id')->on('usuario')->onDelete('cascade');
            $table->bigInteger('id_reim')->unsigned()->index()->nullable();
            $table->foreign('id_reim')->references('id')->on('reim')->onDelete('cascade');
            $table->bigInteger('id_actividad')->unsigned()->index()->nullable();
            $table->foreign('id_actividad')->references('id')->on('actividad')->onDelete('cascade');
            $table->bigInteger('id_elemento')->unsigned()->index()->nullable();
            $table->foreign('id_elemento')->references('id')->on('elemento')->onDelete('cascade');
            $table->datetime('datetime_touch');
            $table->float('Eje_X')->nullable();
            $table->float('Eje_Y')->nullable();
            $table->float('Eje_Z')->nullable();
            $table->integer('correcta')->nullable();
            $table->string('resultado')->nullable();
            $table->integer('Tipo_Registro')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumno_respuesta_actividad');
    }
}
