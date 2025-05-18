<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

Use App\Models\tipoIdentificacion;

class usuario extends Model
{
    /** @use HasFactory<\Database\Factories\UsuarioFactory> */
    use HasFactory;

    protected $primaryKey = 'id_usuarios';

    protected $fillable = [
        'nombre1',
        'nombre2',
        'apellido1',
        'apellido2',
        'id_tipo_identificacion',
        'identificacion',
        'email',
        'contrasena',
        'telefono',
        'direccion',
        'id_rol'
    ];

    public function tipoIdentificacion(): BelongsTo
    {
        return $this->belongsTo(tipoIdentificacion::class);
    }

}
