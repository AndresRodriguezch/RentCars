<?php

namespace Database\Seeders;

use App\Models\rol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'Administrador',
            'Usuario'
        ];

        foreach ($roles as $rol) {
            rol::firstOrCreate(
                ['descripcion' => $rol],
                ['estado' => 1]
            );
        }
    }
}
