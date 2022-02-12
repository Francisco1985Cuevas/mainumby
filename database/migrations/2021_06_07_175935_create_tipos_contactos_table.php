<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_contactos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255)->nullable($value = false);
            $table->string('abreviatura', 3)->nullable($value = true);
            $table->text('comentario')->nullable($value = true);
            $table->timestamps();

            //ASIGNAR CAMPO UNIQUE PARA EVITAR QUE SE DUPLIQUEN REGISTROS POR TIPOS DE CONTACTO
            $table->unique(['nombre']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipos_contactos');
    }
}
