<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiudadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciudades', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255)->nullable($value = false);
            $table->string('abreviatura', 3)->nullable($value = true);
            $table->unsignedBigInteger('departamento_id');
            $table->timestamps();

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('departamento_id')->references('id')->on('departamentos')->nullable($value = true)->constrained()->onDelete('RESTRICT')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ciudades');
    }
}
