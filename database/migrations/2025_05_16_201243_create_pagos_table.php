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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id('id_pagos');
            $table->unsignedBigInteger('id_reserva');
            $table->dateTime('fecha_pago');
            $table->double('monto');
            $table->unsignedBigInteger('id_metodo_pago');
            $table->unsignedBigInteger('id_estado_pago');
            $table->foreign('id_reserva')->references('id_reservas')->on('reservas');
            $table->foreign('id_metodo_pago')->references('id_metodo_pagos')->on('metodo_pagos');
            $table->foreign('id_estado_pago')->references('id_estado_pagos')->on('estado_pagos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
