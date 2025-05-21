<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\propietario;

class PropietarioSeeder extends Seeder
{
    public function run(): void
    {
        $propietarios = [
            ['id_usuario' => 1],
            ['id_usuario' => 2],
        ];

        foreach ($propietarios as $p) {
            propietario::firstOrCreate(
                ['id_usuario' => $p['id_usuario']],
                $p                                 
            );
        }
    }
}
