<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Item extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->id('IdItem');
            $table->string('pregunta')->nullable();
            $table->string('justificacion')->nullable();
            $table->integer('dificultad')->nullable();
            $table->integer('imagen_idimagen')->nullable();
            $table->bigInteger('reim_id')->unsigned()->index()->nullable();
            $table->foreign('reim_id')->references('id')->on('reim')->onDelete('cascade');
            $table->bigInteger('objetivo_aprendizaje_id')->unsigned()->index()->nullable();
            $table->foreign('objetivo_aprendizaje_id')->references('id')->on('objetivo_aprendizaje')->onDelete('cascade');
            $table->bigInteger('elemento_id')->unsigned()->index()->nullable();
            $table->foreign('elemento_id')->references('id')->on('elemento')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item');
    }
}
