<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

Use App\Models\tipoVehiculo;
Use App\Models\propietario;

class vehiculo extends Model
{
    /** @use HasFactory<\Database\Factories\VehiculoFactory> */
    use HasFactory;

    protected $primaryKey = 'id_vehiculos';

    protected $fillable = [
        'marca',
        'modelo',
        'placa',
        'id_tipo_vehiculo',
        'id_propietario',
        'valor_monto',
        'disponible'
    ];

    public function tipoVehiculo(): BelongsTo
    {
        return $this->belongsTo(tipoVehiculo::class);
    }

    public function propietario(): BelongsTo
    {
        return $this->belongsTo(propietario::class);
    }
}
