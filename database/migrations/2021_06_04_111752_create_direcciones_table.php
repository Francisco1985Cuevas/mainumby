<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            //$table->id();
            $table->bigIncrements('id');
            $table->unsignedBigInteger('persona_id');
            $table->unsignedBigInteger('tipo_direccion_id');
            $table->unsignedBigInteger('barrio_id');
            $table->string('calle', 500)->nullable($value = true);
            $table->string('numero_casa', 10)->nullable($value = true);
            $table->string('piso', 10)->nullable($value = true);
            $table->string('departamento', 20)->nullable($value = true);
            $table->string('comentario', 500)->nullable($value = true);
            $table->timestamps();

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('persona_id')->references('id')->on('personas')->nullable()->constrained()->onDelete('RESTRICT')->onUpdate('CASCADE');
            $table->foreign('tipo_direccion_id')->references('id')->on('tipos_direcciones')->nullable()->constrained()->onDelete('RESTRICT')->onUpdate('CASCADE');
            $table->foreign('barrio_id')->references('id')->on('barrios')->nullable()->constrained()->onDelete('RESTRICT')->onUpdate('CASCADE');

            //SETTING THE PRIMARY KEYS
            //$table->index(['id', 'persona']);

            //ASIGNAR CAMPOS UNIQUE PARA EVITAR QUE SE DUPLIQUEN REGISTROS POR DIRECCIONES-PERSONA
            $table->unique(['persona_id', 'tipo_direccion_id', 'barrio_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direcciones');
    }
}
