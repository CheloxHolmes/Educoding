<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AsignaReim extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asigna_reim', function (Blueprint $table) {
            $table->bigInteger('letra_id')->unsigned()->index()->nullable();
            $table->foreign('letra_id')->references('id')->on('letra')->onDelete('cascade');
            $table->bigInteger('periodo_id')->unsigned()->index()->nullable();
            $table->foreign('periodo_id')->references('id')->on('periodo')->onDelete('cascade');
            $table->bigInteger('reim_id')->unsigned()->index()->nullable();
            $table->foreign('reim_id')->references('id')->on('reim')->onDelete('cascade');
            $table->bigInteger('colegio_id')->unsigned()->index()->nullable();
            $table->foreign('colegio_id')->references('id')->on('colegio')->onDelete('cascade');
            $table->bigInteger('nivel_id')->unsigned()->index()->nullable();
            $table->foreign('nivel_id')->references('id')->on('nivel')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asigna_reim');
    }
}
