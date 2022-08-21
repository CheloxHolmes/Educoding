<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetalleElemento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_elemento', function (Blueprint $table) {
            $table->bigInteger('elemento_id')->unsigned()->index()->nullable();
            $table->foreign('elemento_id')->references('id')->on('elemento')->onDelete('cascade');
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
     
        Schema::dropIfExists('detalle_elemento');
    
    }
}
