<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransaccionReim extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaccion_reim', function (Blueprint $table) {
            $table->bigInteger('usuarioenvia_id')->unsigned()->index()->nullable();
            $table->foreign('usuarioenvia_id')->references('id')->on('usuario')->onDelete('cascade');
            $table->bigInteger('usuariorecibe_id')->unsigned()->index()->nullable();
            $table->foreign('usuariorecibe_id')->references('id')->on('usuario')->onDelete('cascade');
            $table->bigInteger('elemento_id')->unsigned()->index()->nullable();
            $table->foreign('elemento_id')->references('id')->on('elemento')->onDelete('cascade');
            $table->bigInteger('catalogo_id')->unsigned()->index()->nullable();
            $table->foreign('catalogo_id')->references('id')->on('catalogo_reim')->onDelete('cascade');
            $table->integer('cantidad')->nullable();
            $table->datetime('datetime_transac')->nullable();
            $table->string('estado')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     
        Schema::dropIfExists('transaccion_reim');
    
    }
}
