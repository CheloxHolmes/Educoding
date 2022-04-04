<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulos', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('image')->default("Programacion.jpg");
            $table->string('description')->nullable();
            $table->string('difficulty')->nullable();
            $table->string('area')->nullable();
            $table->string('category')->nullable();
            $table->string('certificado')->nullable();
            $table->string('insignia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modulos');
    }
}
