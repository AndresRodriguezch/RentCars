<?php

namespace Database\Seeders;

use App\Models\usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        usuario::firstOrCreate(
            ['email' => 'andres.rodriguez@pi.edu.co'],
            [
                'nombre1' => 'Andres',
                'nombre2' => '',
                'apellido1' => 'Rodriguez',
                'apellido2' => 'Charcas',
                'id_tipo_identificacion' => 1,
                'identificacion' => '1111122222',
                'email' => 'andres.rodriguez@pi.edu.co',
                'password' => Hash::make('12345678'),
                'telefono' => '3001112233',
                'direccion' => 'Calle 123',
                'id_rol' => 1
            ]
        );

        usuario::firstOrCreate(
            ['email' => 'faber.cardenas@pi.edu.co'],
            [
                'nombre1' => 'Faber',
                'nombre2' => 'Edwin',
                'apellido1' => 'Cardenas',
                'apellido2' => 'Sequeda',
                'id_tipo_identificacion' => 1,
                'identificacion' => '1234567890',
                'email' => 'faber.cardenas@pi.edu.co',
                'password' => Hash::make('12345678'),
                'telefono' => '3104445566',
                'direccion' => 'Carrera 45',
                'id_rol' => 2
            ]
        );
    }
}
