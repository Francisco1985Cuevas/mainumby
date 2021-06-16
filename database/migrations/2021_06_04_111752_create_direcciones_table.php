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
            $table->unsignedBigInteger('persona');
            $table->unsignedBigInteger('tipo_direccion');
            $table->unsignedBigInteger('barrio');
            $table->string('calle', 500)->nullable($value = true);
            $table->string('numero_casa', 10)->nullable($value = true);
            $table->string('piso', 10)->nullable($value = true);
            $table->string('departamento', 20)->nullable($value = true);
            $table->string('comentario', 500)->nullable($value = true);
            $table->timestamps();

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('persona')->references('id')->on('personas')->nullable()->constrained()->onDelete('RESTRICT')->onUpdate('CASCADE');
            $table->foreign('tipo_direccion')->references('id')->on('tipos_direcciones')->nullable()->constrained()->onDelete('RESTRICT')->onUpdate('CASCADE');
            $table->foreign('barrio')->references('id')->on('barrios')->nullable()->constrained()->onDelete('RESTRICT')->onUpdate('CASCADE');

            //SETTING THE PRIMARY KEYS
            $table->index(['id', 'persona']);
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
