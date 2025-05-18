<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

Use App\Models\usuario;
Use App\Models\vehiculo;
Use App\Models\estadoReserva;

class reserva extends Model
{
    /** @use HasFactory<\Database\Factories\ReservaFactory> */
    use HasFactory;

    protected $primaryKey = 'id_reservas';

    protected $fillable = [
        'id_usuario',
        'id_vehiculo',
        'fecha_inicio',
        'fecha_fin',
        'id_estado_reserva'
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(usuario::class);
    }

    public function vehiculo(): BelongsTo
    {
        return $this->belongsTo(vehiculo::class);
    }

    public function estado_reserva(): BelongsTo
    {
        return $this->belongsTo(estadoReserva::class);
    }
}
