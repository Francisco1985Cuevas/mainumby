<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactos', function (Blueprint $table) {
            //$table->id();
            $table->bigIncrements('id');
            $table->unsignedBigInteger('persona');
            $table->unsignedBigInteger('tipo_contacto');
            $table->string('numero_contacto', 20)->nullable($value = false);
            $table->string('comentario', 500)->nullable($value = true);
            $table->timestamps();

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('persona')->references('id')->on('personas')->nullable()->constrained()->onDelete('RESTRICT')->onUpdate('CASCADE');
            $table->foreign('tipo_contacto')->references('id')->on('tipos_contactos')->nullable()->constrained()->onDelete('RESTRICT')->onUpdate('CASCADE');

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
        Schema::dropIfExists('contactos');
    }
}
