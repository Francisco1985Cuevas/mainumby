<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barrios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255)->nullable($value = false);
            $table->string('abreviatura', 3)->nullable($value = true);
            $table->unsignedBigInteger('ciudad_id');
            $table->timestamps();

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('ciudad_id')->references('id')->on('ciudades')->nullable()->constrained()->onDelete('RESTRICT')->onUpdate('CASCADE');

            //ASIGNAR CAMPO UNIQUE PARA EVITAR QUE SE DUPLIQUEN REGISTROS POR NOMBRE DE BARRIO Y CIUDAD
            $table->unique(['nombre', 'ciudad_id']);

            //Un campo por el cual realizamos consultas frecuentemente es "nombre", indexar
            //la tabla por ese campo sería útil.
            $table->index('nombre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barrios');
    }
}
