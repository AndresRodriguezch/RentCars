<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

Use App\Models\reserva;
Use App\Models\estadoPago;
Use App\Models\metodoPago;

class pago extends Model
{
    /** @use HasFactory<\Database\Factories\PagoFactory> */
    use HasFactory;

    protected $primaryKey = 'id_pagos';

    protected $fillable = [
        'id_reserva',
        'fecha_pago',
        'monto',
        'id_metodo_pago',
        'id_estado_pago'
    ];

    public function reserva(): BelongsTo
    {
        return $this->belongsTo(reserva::class);
    }

    public function metodo_pago(): BelongsTo
    {
        return $this->belongsTo(metodoPago::class);
    }

    public function estado_pago(): BelongsTo
    {
        return $this->belongsTo(estadoPago::class);
    }
}
