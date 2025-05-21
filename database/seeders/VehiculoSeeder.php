<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehiculo;

class VehiculoSeeder extends Seeder
{
    public function run()
    {
         $vehiculos = [
            [
                'marca' => 'Toyota',
                'modelo' => 'Corolla',
                'placa' => 'ABC-123',
                'id_tipo_vehiculo' => 1,
                'id_propietario' => 1,
                'valor_coche' => 15000.00,
                'disponible' => true,
                'imagen' => 'https://i.pinimg.com/736x/55/61/e9/5561e9d1073945487b3382e73d8c7973.jpg',
            ],
            [
                'marca' => 'Honda',
                'modelo' => 'Civic',
                'placa' => 'XYZ-789',
                'id_tipo_vehiculo' => 1,
                'id_propietario' => 2,
                'valor_coche' => 18000.50,
                'disponible' => false,
                'imagen' => 'https://i.pinimg.com/736x/55/70/2b/55702bd7a09853c7b3d4f5d01001cd4d.jpg',
            ],
            [
                'marca' => 'Ford',
                'modelo' => 'F-150',
                'placa' => 'LMN-456',
                'id_tipo_vehiculo' => 2,
                'id_propietario' => 1,
                'valor_coche' => 25000.00,
                'disponible' => true,
                'imagen' => 'https://i.pinimg.com/736x/dc/20/b1/dc20b1906e65b9014ab8a00561b8ba0a.jpg',
            ],
            [
                'marca' => 'Chevrolet',
                'modelo' => 'Malibu',
                'placa' => 'JKL-234',
                'id_tipo_vehiculo' => 1,
                'id_propietario' => 2,
                'valor_coche' => 17000.00,
                'disponible' => true,
                'imagen' => 'https://i.pinimg.com/736x/48/cd/8a/48cd8a3bc3eeb856eff608998d510e52.jpg',
            ],
        ];

        foreach ($vehiculos as $vehiculo) {
            Vehiculo::firstOrCreate(
                ['placa' => $vehiculo['placa']], // campos únicos
                $vehiculo                       // valores completos
            );
        }
    }
}
