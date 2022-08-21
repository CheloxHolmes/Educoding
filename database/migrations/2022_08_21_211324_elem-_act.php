<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ElemAct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Elem-Act', function (Blueprint $table) {
            $table->bigInteger('elemento_id')->unsigned()->index()->nullable();
            $table->foreign('elemento_id')->references('id')->on('elemento')->onDelete('cascade');
            $table->bigInteger('actividad_id')->unsigned()->index()->nullable();
            $table->foreign('actividad_id')->references('id')->on('actividad')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     
        Schema::dropIfExists('Elem-Act');
    
    }
}
