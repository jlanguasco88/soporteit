<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Impresora extends Model
{
    protected $fillable = [
        'modelo',
        'ubicacion',
        'descripcion'
    ];

    public function cambios()
{
    return $this->hasMany(CambioToner::class);
}

public function ubicacion()
    {
        return $this->belongsTo(Ubication::class);
    }

    // Relación con CambioToner (uno a muchos)
   
}
