<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

class CreatePaisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('paises', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255)->nullable($value = false);
            $table->string('abreviatura', 3)->nullable($value = true);
            $table->timestamps();

            //ASIGNAR CAMPO UNIQUE PARA EVITAR QUE SE DUPLIQUEN REGISTROS POR NOMBRE DE PAIS
            $table->unique(['nombre']);
        });

        // Las columnas: [created_at, updated_at] son campos que se cargan automaticamente cuando son ingresados desde la Aplicacion.
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paises');
    }
}
