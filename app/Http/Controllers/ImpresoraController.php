<?php

namespace App\Http\Controllers;
use App\Models\Impresora;
use Illuminate\Http\Request;

class ImpresoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $impresoras = Impresora::all();
    return view('paginas.impresoras.index', compact('impresoras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paginas.impresoras.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'modelo' => 'required|string|max:100',
            'ubicacion' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);
    
        Impresora::create($request->all());
    
        return redirect()->route('impresoras.index')->with('RegistroCreado', 'OK');
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
