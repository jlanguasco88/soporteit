<?php

namespace App\Http\Controllers;


use App\Models\Toner;
use Illuminate\Http\Request;

class TonerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $toners = Toner::select('modelo')
        ->selectRaw('COUNT(*) as total')
        ->selectRaw("COUNT(CASE WHEN estado = 'disponible' THEN 1 END) as disponibles")
        ->groupBy('modelo')
        ->get();

    return view('paginas.toners.index', compact('toners'));
    }

    public function listarPorModelo($modelo)
{
    $toners = Toner::where('modelo', $modelo)->orderBy('created_at', 'desc')->get();

    return view('paginas.toners.listado_modelo', compact('toners', 'modelo'));
}
    public function create()
    {
       // Obtener los modelos de toner únicos desde la base de datos
    $modelos = Toner::select('modelo')->distinct()->get();

    // Pasar la variable $modelos a la vista
    return view('paginas.toners.create', compact('modelos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'modelo' => 'required|string',
            'cantidad' => 'required|integer|min:1',
        ]);
    
        $modelo = $request->modelo;
        $cantidad = $request->cantidad;
    
        // Obtener el contador actual para ese modelo
        $ultimo = Toner::where('modelo', $modelo)
                    ->orderByDesc('created_at')
                    ->first();
    
        $contador = 1;
    
        if ($ultimo) {
            // Extraer el número del código: 85A-100 → 100
            $partes = explode('-', $ultimo->codigo_unico);
            $contador = isset($partes[1]) ? ((int) $partes[1]) + 1 : 1;
        }
    
        for ($i = 0; $i < $cantidad; $i++) {
            $codigo = $modelo . '-' . ($contador + $i);
    
                Toner::create([
                'modelo' => $modelo,
                'estado' => 'disponible',
                'codigo_unico' => $codigo,
            ]);
        }
    
        return redirect()->route('toners.index')->with('RegistroCreado', 'OK');

    }

    /**
     * Display the specified resource.
     */
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
