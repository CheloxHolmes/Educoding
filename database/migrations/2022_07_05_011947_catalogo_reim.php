<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CatalogoReim extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogo_reim', function (Blueprint $table) {
            $table->id();
            $table->string('sesion_id')->index()->nullable();
            $table->foreign('sesion_id')->references('sesion_id')->on('asigna_reim_alumno')->onDelete('cascade');
            $table->bigInteger('id_elemento')->unsigned()->index()->nullable();
            $table->foreign('id_elemento')->references('id')->on('elemento')->onDelete('cascade');
            $table->integer('cantidad')->nullable();
            $table->integer('precio')->nullable();
            $table->datetime('datetime_realiza')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalogo_reim');
    }
}
