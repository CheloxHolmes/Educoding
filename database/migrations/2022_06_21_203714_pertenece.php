<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pertenece extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertenece', function (Blueprint $table) {
            $table->dateTime('fecha')->nullable();
            $table->bigInteger('usuario_id')->unsigned()->index()->nullable();
            $table->foreign('usuario_id')->references('id')->on('usuario')->onDelete('cascade');
            $table->bigInteger('colegio_id')->unsigned()->index()->nullable();
            $table->foreign('colegio_id')->references('id')->on('colegio')->onDelete('cascade');
            $table->bigInteger('nivel_id')->unsigned()->index()->nullable();
            $table->foreign('nivel_id')->references('id')->on('nivel')->onDelete('cascade');
            $table->bigInteger('letra_id')->unsigned()->index()->nullable();
            $table->foreign('letra_id')->references('id')->on('letra')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pertenece');
    }
}
