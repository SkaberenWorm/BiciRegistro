<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDuenosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duenos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rut',10)->unique();
            $table->string('nombre');
            $table->string('correo');
            $table->integer('celular')->nullable();
            $table->integer('tipoDueno_id')->unsigned()->index();
            $table->foreign('tipoDueno_id')->references('id')->on('tipo_duenos');
            $table->string('image')->nullable()->default('duenos/default_duenos.png');
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
        Schema::dropIfExists('duenos');
    }
}
