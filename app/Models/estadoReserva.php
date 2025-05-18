<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estadoReserva extends Model
{
    /** @use HasFactory<\Database\Factories\EstadoReservaFactory> */
    use HasFactory;

    protected $primaryKey = 'id_estado_reservas';

    protected $fillable = [
        'descripcion',
        'estado'
    ];
}
