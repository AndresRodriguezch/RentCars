<?php

namespace Database\Seeders;

use App\Models\tipoVehiculo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoVehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos_vehiculo = [
            'Automovil',
            'Camioneta',
            'Moto'
        ];

        foreach ($tipos_vehiculo as $tipo) {
            tipoVehiculo::firstOrCreate(
                ['descripcion' => $tipo],
                ['estado' => 1]
            );
        }
    }
}
