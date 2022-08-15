<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Alternativa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternativa', function (Blueprint $table) {
            $table->id('idalternativa');
            $table->string('txt_alte')->nullable();
            $table->bigInteger('IMAGEN_idimagen')->unsigned()->index()->nullable();
            $table->foreign('IMAGEN_idimagen')->references('idimagen')->on('imagen')->onDelete('cascade');
            $table->string('Justificacion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alternativa');
    }
}
