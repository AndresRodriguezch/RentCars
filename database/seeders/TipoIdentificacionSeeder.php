<?php

namespace Database\Seeders;

use App\Models\tipoIdentificacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoIdentificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $tipos_identificacion = [
            'Cédula de ciudadanía',
            'Tarjeta de identidad',
            'Cédula de extranjería',
            'Pasaporte',
            'NIT'
        ];

        foreach ($tipos_identificacion as $tipo) {
            TipoIdentificacion::firstOrCreate(
                ['descripcion' => $tipo],
                ['estado' => 1]
            );
        }
    }
}
