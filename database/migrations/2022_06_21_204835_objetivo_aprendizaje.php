<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ObjetivoAprendizaje extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objetivo_aprendizaje', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->longText('descripcion')->nullable();
            $table->integer('eje_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objetivo_aprendizaje');
    }
}
