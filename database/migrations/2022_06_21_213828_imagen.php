<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Imagen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagen', function (Blueprint $table) {
            $table->id('idimagen')->nullable()->autoIncrement();
            $table->string('nombre')->nullable();
            $table->binary('imagen')->nullable();
            $table->bigInteger('id_elemento')->unsigned()->index()->nullable();
            $table->foreign('id_elemento')->references('id')->on('elemento')->onDelete('cascade');
            $table->string('descripcion')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagen');
    }
}
