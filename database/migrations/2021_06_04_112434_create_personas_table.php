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
            $table->string('nombres', 255)->nullable($value = false);
            $table->string('apellidos', 255)->nullable($value = true);
            $table->date('fecha_nacimiento')->nullable($value = true);
            $table->string('tipo_persona', 30)->nullable($value = true);
            $table->string('sexo', 1)->nullable($value = true);
            $table->text('comentario')->nullable($value = true);
            $table->timestamps();

            //Un campo por el cual realizamos consultas frecuentemente es "nombres", indexar
            //la tabla por ese campo sería útil.
            $table->index('nombres');
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
