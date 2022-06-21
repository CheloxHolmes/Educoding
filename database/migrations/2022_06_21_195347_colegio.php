<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Colegio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colegio', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('direccion')->nullable();
            $table->string('fono')->nullable();
            $table->integer('rbd')->nullable();
            $table->integer('dgv_rbd')->nullable();
            $table->integer('mrun')->nullable();
            $table->integer('rut_sostenedor')->nullable();
            $table->integer('p_juridica')->nullable();
            $table->tinyInteger('rural')->nullable();
            $table->integer('comuna_id')->unsigned()->index()->nullable();
            $table->foreign('comuna_id')->references('id')->on('comuna')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colegio');
    }
}
