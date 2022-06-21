<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Actividadxreim extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividadxreim', function (Blueprint $table) {
            $table->integer('id_actividad')->unsigned()->index()->nullable();
            $table->foreign('id_actividad')->references('id')->on('actividad')->onDelete('cascade');
            $table->integer('id_reim')->unsigned()->index()->nullable();
            $table->foreign('id_reim')->references('id')->on('reim')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividadxreim');
    }
}
