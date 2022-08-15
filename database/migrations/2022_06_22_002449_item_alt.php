<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ItemAlt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_alt', function (Blueprint $table) {
            $table->id('indice');
            $table->bigInteger('idalternativa')->unsigned()->index()->nullable();
            $table->foreign('idalternativa')->references('idalternativa')->on('alternativa')->onDelete('cascade');
            $table->integer('orden')->nullable();
            $table->string('escorrecto')->nullable();
            $table->bigInteger('ITEM_IdItem')->unsigned()->index()->nullable();
            $table->foreign('ITEM_IdItem')->references('IdItem')->on('item')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('item_alt');
    }
}
