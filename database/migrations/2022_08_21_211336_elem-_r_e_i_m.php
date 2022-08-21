<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ElemREIM extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Elem-REIM', function (Blueprint $table) {
            $table->bigInteger('elemento_id')->unsigned()->index()->nullable();
            $table->foreign('elemento_id')->references('id')->on('elemento')->onDelete('cascade');
            $table->bigInteger('reim_id')->unsigned()->index()->nullable();
            $table->foreign('reim_id')->references('id')->on('reim')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     
        Schema::dropIfExists('Elem-REIM');
    
    }
}
