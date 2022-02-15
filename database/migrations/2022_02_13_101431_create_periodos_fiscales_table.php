<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodosFiscalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodos_fiscales', function (Blueprint $table) {
            $table->id();
            $table->integer('periodo');
            $table->string('descripcion', 500)->nullable($value = false);
            $table->text('comentario')->nullable($value = true);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            //ASIGNAR CAMPO UNIQUE PARA EVITAR QUE SE DUPLIQUEN REGISTROS POR PERIODOS POR USUARIO
            $table->unique(['periodo', 'user_id']);

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('user_id')->references('id')->on('users')->nullable()->constrained()->onDelete('RESTRICT')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periodos_fiscales');
    }
}
