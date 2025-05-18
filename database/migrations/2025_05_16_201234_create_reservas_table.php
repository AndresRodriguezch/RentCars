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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id('id_reservas');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_vehiculo');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->unsignedBigInteger('id_estado_reserva');
            $table->foreign('id_usuario')->references('id_usuarios')->on('usuarios');
            $table->foreign('id_vehiculo')->references('id_vehiculos')->on('vehiculos');
            $table->foreign('id_estado_reserva')->references('id_estado_reservas')->on('estado_reservas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
