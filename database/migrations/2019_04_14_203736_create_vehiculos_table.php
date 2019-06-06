<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo')->unique();;
            $table->string('modelo')->nullable();
            $table->string('color');
            $table->boolean('isInside')->default(true);
            $table->integer('marca_id')->unsigned()->index();
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->integer('dueno_id')->unsigned()->index();
            $table->foreign('dueno_id')->references('id')->on('duenos');
            $table->string('image')->nullable()->default('bicicletas/default_bicicleta.png');
            $table->boolean('activo')->default(true);
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
        Schema::dropIfExists('vehiculos');
    }
}
