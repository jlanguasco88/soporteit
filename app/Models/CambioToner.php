<?php

namespace App\Models;
use App\Models\Ubication;
use Illuminate\Database\Eloquent\Model;

class CambioToner extends Model
{

    protected $table = 'cambio_toners';
    protected $casts = [
        'fecha_cambio' => 'datetime',
    ];
    protected $fillable = [
        'impresora_id',
        'toner_id',
        'fecha_cambio',
        'contador_paginas',
        'motivo',
        'paginas_impresas',
        'duracion_dias',
    ];

    // Relación con la impresora
    public function impresora()
{
    return $this->belongsTo(Impresora::class);
}
// Relación con el toner

public function toner()
{
    return $this->belongsTo(Toner::class);
}


}
