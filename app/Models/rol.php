<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rol extends Model
{
    /** @use HasFactory<\Database\Factories\RolFactory> */
    use HasFactory;

    protected $primaryKey = 'id_rols';

    protected $fillable = [
        'descripcion',
        'estado'
    ];
}
