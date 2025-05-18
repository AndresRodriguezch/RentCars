<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;

Use App\Models\tipoIdentificacion;
Use App\Models\rol;

class usuario extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UsuarioFactory> */
    use HasFactory;

    protected $primaryKey = 'id_usuarios';
    protected $table = 'usuarios';
    public $timestamps = false;

    protected $fillable = [
        'nombre1',
        'nombre2',
        'apellido1',
        'apellido2',
        'id_tipo_identificacion',
        'identificacion',
        'email',
        'password',
        'telefono',
        'direccion',
        'id_rol'
    ];

    protected $hidden = [
        'password',
    ];

    public function tipoIdentificacion(): BelongsTo
    {
        return $this->belongsTo(tipoIdentificacion::class);
    }

    public function rol(): BelongsTo
    {
        return $this->belongsTo(rol::class);
    }
}
