<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('primer_nombre', 255)->nullable($value = false);
            $table->string('segundo_nombre', 255)->nullable($value = true);
            $table->string('primer_apellido', 255)->nullable($value = true);
            $table->string('segundo_apellido', 255)->nullable($value = true);
            $table->unsignedBigInteger('ciudad_id');
            $table->date('fecha_nacimiento')->nullable($value = true);
            $table->string('tipo_persona', 255)->nullable($value = true);
            $table->string('estado_civil', 1)->nullable($value = true);
            $table->string('sexo', 1)->nullable($value = true);
            $table->string('foto', 255)->nullable($value = true);
            $table->string('estado', 255)->nullable($value = true);
            $table->text('comentario')->nullable($value = true);
            $table->timestamps();

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('ciudad_id')->references('id')->on('ciudades')->nullable()->constrained()->onDelete('RESTRICT')->onUpdate('CASCADE');

            //Un campo por el cual realizamos consultas frecuentemente es "primer_nombre", indexar
            //la tabla por ese campo sería útil.
            $table->index('primer_nombre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
