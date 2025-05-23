<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CambioTonerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         $fecha_inicio = $request->input('fecha_inicio');
    $fecha_fin = $request->input('fecha_fin');

    $impresoras = \App\Models\Impresora::with([
        'ubicacion',
        'cambios' => function ($q) use ($fecha_inicio, $fecha_fin) {
            $q->whereNotNull('fecha_cambio'); // Filtrar cambios con fecha
            if ($fecha_inicio && $fecha_fin) {
                // Filtrar por el rango de fechas
                $q->whereBetween('fecha_cambio', [$fecha_inicio, $fecha_fin]);
            }
            $q->orderByDesc('fecha_cambio')->limit(1); // Solo el último cambio
        },
        'cambios.toner'
    ])->get();

    return view('paginas.cambios.index', compact('impresoras', 'fecha_inicio', 'fecha_fin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $impresoras = \App\Models\Impresora::all();
    $impresoraSeleccionada = $request->input('impresora_id');

    $toners = collect(); // Vacío por defecto

    if ($impresoraSeleccionada) {
        $impresora = \App\Models\Impresora::with(['cambios.toner'])->find($impresoraSeleccionada);

        // Obtener el modelo del último toner usado
        $ultimoCambio = $impresora?->cambios?->sortByDesc('fecha_cambio')?->first();

        if ($ultimoCambio && $ultimoCambio->toner) {
            $modelo = $ultimoCambio->toner->modelo;
            // Toners disponibles solo de ese modelo
            $toners = \App\Models\Toner::where('estado', 'disponible')
                        ->where('modelo', $modelo)
                        ->get();
        } else {
            // Si no hay historial, mostrar todos los toners disponibles
            $toners = \App\Models\Toner::where('estado', 'disponible')->get();
        }
    } else {
        // Si no hay impresora seleccionada, mostrar todos los disponibles
        $toners = \App\Models\Toner::where('estado', 'disponible')->get();
    }

    return view('paginas.cambios.create', compact('impresoras', 'toners', 'impresoraSeleccionada'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'impresora_id' => 'required|exists:impresoras,id',
            'toner_id' => 'required|exists:toners,id',
            'fecha_cambio' => 'required|date',
            'contador_paginas' => 'required|integer|min:0',
            'motivo' => 'required|in:Toner bajo,Falla,Otro',
        ]);
    
        // Obtener último cambio de esa impresora
        $ultimoCambio = \App\Models\CambioToner::where('impresora_id', $request->impresora_id)
                            ->orderByDesc('fecha_cambio')
                            ->first();
    
        $paginas_impresas = null;
        $duracion_dias = null;
    
        if ($ultimoCambio) {
            $paginas_impresas = $request->contador_paginas - $ultimoCambio->contador_paginas;
            $duracion_dias = \Carbon\Carbon::parse($ultimoCambio->fecha_cambio)
                                ->diffInDays(\Carbon\Carbon::parse($request->fecha_cambio));
        }
    
        // Crear registro de cambio
        \App\Models\CambioToner::create([
            'impresora_id' => $request->impresora_id,
            'toner_id' => $request->toner_id,
            'fecha_cambio' => $request->fecha_cambio,
            'contador_paginas' => $request->contador_paginas,
            'motivo' => $request->motivo,
            'paginas_impresas' => $paginas_impresas,
            'duracion_dias' => $duracion_dias,
        ]);
    
        // Marcar toner como instalado/usado
        $toner = \App\Models\Toner::find($request->toner_id);
        $toner->estado = 'usado';
        $toner->save();
    
        return redirect()->route('cambios.index')->with('RegistroCreado', 'OK');
    }

    public function historial($id)
{
    $impresora = \App\Models\Impresora::with(['cambios.toner'])->findOrFail($id);
    return view('paginas.cambios.historial', compact('impresora'));
}  

public function filtrado(Request $request)
{
   
    $request->validate([
        'fecha_inicio' => 'required|date',
        'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
    ]);

    $fecha_inicio = $request->fecha_inicio;
    $fecha_fin = $request->fecha_fin;

    $cambios = \App\Models\CambioToner::with(['impresora', 'toner'])
                ->whereBetween('fecha_cambio', [$fecha_inicio, $fecha_fin])
                ->orderBy('fecha_cambio', 'desc')
                ->get();

    return view('paginas.cambios.filtrado', compact('cambios', 'fecha_inicio', 'fecha_fin'));
}
public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
