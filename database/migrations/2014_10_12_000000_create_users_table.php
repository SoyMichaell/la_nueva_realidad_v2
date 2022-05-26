<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_documento');
            $table->string('numero_documento');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('correo_institucional')->unique();
            $table->string('correo_personal')->unique();
            $table->string('password');
            $table->string('telefono');
            $table->string('nivel_programa');
            $table->string('programa');
            $table->string('estado');
            $table->string('slug');
            $table->integer('rol');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
