<?php


namespace App\Http\Controllers;

use App\Models\Ubication;
use Illuminate\Http\Request;

class UbicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ubicaciones = Ubication::all();
        return view('paginas.ubicaciones.index', compact('ubicaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paginas.ubicaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'usuario' => 'required|string',
            'nombreRed' => 'nullable|string',
            'grupoRed' => 'nullable|string',
            'estado' => 'required|boolean',
            'ip' => 'nullable|ip', // Agregar validación para 'ip'
        ]);
    
        Ubication::create($request->only([
            'usuario', 'nombreRed', 'grupoRed', 'estado', 'ip' // 'ip' agregado
        ]));
    
        return redirect()->route('ubicaciones.index')->with('RegistroCreado','OK');
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
    public function edit($id)
    {
        $ubicacion = Ubication::findOrFail($id);
        return view('paginas.ubicaciones.edit', compact('ubicacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'usuario' => 'required|string',
            'nombreRed' => 'nullable|string',
            'grupoRed' => 'nullable|string',
            'estado' => 'required|boolean',
            'ip' => 'nullable|ip', // Agregar validación para 'ip'
        ]);
    
        $ubicacion = Ubication::findOrFail($id);
        $ubicacion->update($request->only([
            'usuario', 'nombreRed', 'grupoRed', 'estado', 'ip' // 'ip' agregado
        ]));
    
        return redirect()->route('ubicaciones.index')->with('RegistroActualizado','OK');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ubicacion = Ubication::findOrFail($id);
        $ubicacion->delete();

        return redirect()->route('ubicaciones.index')->with('success', 'Ubicación eliminada correctamente');
    }
}
