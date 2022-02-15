<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rol_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('rol_id')->references('id')->on('roles')->nullable()->constrained()->onDelete('RESTRICT')->onUpdate('CASCADE');
            $table->foreign('user_id')->references('id')->on('users')->nullable()->constrained()->onDelete('RESTRICT')->onUpdate('CASCADE');

            //ASIGNAR CAMPOS UNIQUE PARA EVITAR QUE SE DUPLIQUEN REGISTROS POR ROLES-USERS
            $table->unique(['rol_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles_users');
    }
}
