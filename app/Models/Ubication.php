<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubication extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario',
    'nombreRed',
    'grupoRed',
    'estado',
    'ip', // Agregar ip
    ];
}
