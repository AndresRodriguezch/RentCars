<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\usuario;

class propietario extends Model
{
    /** @use HasFactory<\Database\Factories\PropietarioFactory> */
    use HasFactory;

    protected $primaryKey = 'id_propietarios';

    protected $fillable = [
        'id_usuario'
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(usuario::class, 'id_usuario');
    }
}
