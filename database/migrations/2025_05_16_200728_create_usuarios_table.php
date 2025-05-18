<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuarios');
            $table->string('nombre1');
            $table->string('nombre2')->nullable();
            $table->string('apellido1');
            $table->string('apellido2');
            $table->unsignedBigInteger('id_tipo_identificacion');
            $table->string('identificacion')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('telefono');
            $table->string('direccion');
            $table->unsignedBigInteger('id_rol');
            $table->foreign('id_tipo_identificacion')->references('id_tipo_identificacions')->on('tipo_identificacions');
            $table->foreign('id_rol')->references('id_rols')->on('rols');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
