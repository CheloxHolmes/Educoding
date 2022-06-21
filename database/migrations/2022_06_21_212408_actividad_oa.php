<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ActividadOa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad_oa', function (Blueprint $table) {
            $table->integer('id_oa')->unsigned()->index()->nullable();
            $table->foreign('id_oa')->references('id')->on('objetivo_aprendizaje')->onDelete('cascade');
            $table->integer('id_actividad')->unsigned()->index()->nullable();
            $table->foreign('id_actividad')->references('id')->on('actividad')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividad_oa');
    }
}
