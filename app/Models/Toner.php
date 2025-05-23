<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Toner extends Model
{
    protected $fillable = [
        'modelo',
        'estado',
        'codigo_unico'
    ];

    public function cambios()
{
    return $this->hasMany(CambioToner::class);
}

    public static function boot()
    {
        parent::boot();

        static::creating(function ($toner) {
            $ultimo = Toner::where('modelo', $toner->modelo)
                           ->orderByDesc('id')
                           ->pluck('codigo_unico')
                           ->first();

            $numero = 0;
            if ($ultimo && preg_match('/-(\d+)$/', $ultimo, $match)) {
                $numero = intval($match[1]);
            }

            $nuevoNumero = $numero + 1;
            $toner->codigo_unico = $toner->modelo . '-' . $nuevoNumero;
        });
    }

    public $timestamps = true;
}
