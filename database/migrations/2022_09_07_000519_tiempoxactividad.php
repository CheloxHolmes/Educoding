<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tiempoxactividad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiempoxactividad', function (Blueprint $table) {
            $table->id();
            $table->datetime('inicio');
            $table->datetime('final');
            $table->integer('causa')->nullable();
            $table->bigInteger('usuario_id')->unsigned()->index()->nullable();
            $table->foreign('usuario_id')->references('id')->on('usuario')->onDelete('cascade');
            $table->bigInteger('reim_id')->unsigned()->index()->nullable();
            $table->foreign('reim_id')->references('id')->on('reim')->onDelete('cascade');
            $table->bigInteger('actividad_id')->unsigned()->index()->nullable();
            $table->foreign('actividad_id')->references('id')->on('reim')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tiempoxactividad');
    }
}
