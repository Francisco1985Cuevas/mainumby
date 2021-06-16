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
            //$table->bigIncrements('id');
            $table->unsignedBigInteger('persona');
            $table->unsignedBigInteger('tipo_documento');
            $table->string('numero_documento', 20)->nullable($value = false);
            $table->timestamps();

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('persona')->references('id')->on('personas')->nullable()->constrained()->onDelete('RESTRICT')->onUpdate('CASCADE');
            $table->foreign('tipo_documento')->references('id')->on('tipos_documentos')->nullable()->constrained()->onDelete('RESTRICT')->onUpdate('CASCADE');

            //SETTING THE PRIMARY KEYS
            $table->index(['persona', 'tipo_documento', 'numero_documento']);
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
