<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNacionalidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nacionalidades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pais_id');
            $table->string('nombre', 255)->nullable($value = false);
            $table->string('abreviatura', 3)->nullable($value = true);
            $table->text('comentario')->nullable($value = true);
            $table->timestamps();

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('pais_id')->references('id')->on('paises')->nullable()->constrained()->onDelete('RESTRICT')->onUpdate('CASCADE');

            //ASIGNAR CAMPOS UNIQUE PARA EVITAR QUE SE DUPLIQUEN REGISTROS POR NACIONALIDADES
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
        Schema::dropIfExists('nacionalidades');
    }
}
