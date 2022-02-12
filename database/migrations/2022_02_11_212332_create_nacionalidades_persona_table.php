<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNacionalidadesPersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nacionalidades_persona', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nacionalidad_id');
            $table->unsignedBigInteger('persona_id');
            $table->timestamps();

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('nacionalidad_id')->references('id')->on('nacionalidades')->nullable()->constrained()->onDelete('RESTRICT')->onUpdate('CASCADE');
            $table->foreign('persona_id')->references('id')->on('personas')->nullable()->constrained()->onDelete('RESTRICT')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nacionalidades_persona');
    }
}
