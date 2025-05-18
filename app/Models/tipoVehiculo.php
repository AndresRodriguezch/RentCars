<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipoVehiculo extends Model
{
    /** @use HasFactory<\Database\Factories\TipoVehiculoFactory> */
    use HasFactory;

    protected $primaryKey = 'id_tipo_vehiculos';

    protected $fillable = [
        'descripcion',
        'estado'
    ];
}
