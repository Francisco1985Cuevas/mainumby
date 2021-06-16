<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_direcciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 60)->nullable($value = false);
            $table->string('abreviatura', 3)->nullable($value = true);
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
        Schema::dropIfExists('tipos_direcciones');
    }
}
