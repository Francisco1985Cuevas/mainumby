<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('persona_id');
            $table->unsignedBigInteger('tipo_documento_id');
            $table->string('numero_documento', 60)->nullable($value = false);
            $table->string('foto_documento_frente', 255)->nullable($value = true);
            $table->string('foto_documento_dorso', 255)->nullable($value = true);
            $table->date('fecha_emision')->nullable($value = true);
            $table->date('fecha_vencimiento')->nullable($value = true);
            $table->text('comentario')->nullable($value = true);
            $table->timestamps();

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('persona_id')->references('id')->on('personas')->nullable()->constrained()->onDelete('RESTRICT')->onUpdate('CASCADE');
            $table->foreign('tipo_documento_id')->references('id')->on('tipos_documentos')->nullable()->constrained()->onDelete('RESTRICT')->onUpdate('CASCADE');

            //ASIGNAR CAMPOS UNIQUE PARA EVITAR QUE SE DUPLIQUEN REGISTROS POR DOCUMENTOS-PERSONA
            $table->unique(['persona_id', 'tipo_documento_id', 'numero_documento']);

            //Un campo por el cual realizamos consultas frecuentemente es "numero_documento", indexar
            //la tabla por ese campo sería útil.
            $table->index('numero_documento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos');
    }
}
