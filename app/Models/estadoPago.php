<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estadoPago extends Model
{
    /** @use HasFactory<\Database\Factories\EstadoPagoFactory> */
    use HasFactory;

    protected $primaryKey = 'id_estado_pagos';

    protected $fillable = [
        'descripcion',
        'estado'
    ];
}
