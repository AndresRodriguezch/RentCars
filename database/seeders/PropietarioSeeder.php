<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\propietario;

class PropietarioSeeder extends Seeder
{
    public function run(): void
    {
        // Asegúrate de que existan estos usuarios en la tabla 'usuarios'
        $propietarios = [
            ['id_usuario' => 1],
            ['id_usuario' => 2],
            ['id_usuario' => 3],
        ];

        foreach ($propietarios as $p) {
            propietario::create($p);
        }
    }
}
