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
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id('id_vehiculos');
            $table->string('marca');
            $table->string('modelo');
            $table->string('placa');
            $table->unsignedBigInteger('id_tipo_vehiculo');
            $table->unsignedBigInteger('id_propietario');
            $table->double('valor_coche');
            $table->string('imagen');
            $table->boolean('disponible');
            $table->foreign('id_tipo_vehiculo')->references('id_tipo_vehiculos')->on('tipo_vehiculos');
            $table->foreign('id_propietario')->references('id_propietarios')->on('propietarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};
