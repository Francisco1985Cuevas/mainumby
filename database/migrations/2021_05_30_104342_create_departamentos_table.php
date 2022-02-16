<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255)->nullable($value = false);
            $table->string('abreviatura', 3)->nullable($value = true);
            $table->unsignedBigInteger('pais_id');
            $table->string('region', 255)->nullable($value = false);
            $table->timestamps();

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('pais_id')->references('id')->on('paises')->nullable()->constrained()->onDelete('RESTRICT')->onUpdate('CASCADE');

            //ASIGNAR CAMPO UNIQUE PARA EVITAR QUE SE DUPLIQUEN REGISTROS POR NOMBRE DE DEPARTAMENTO
            $table->unique(['nombre', 'pais_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departamentos');
    }
}
