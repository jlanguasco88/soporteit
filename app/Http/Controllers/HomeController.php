<?php

namespace App\Http\Controllers;
use App\Models\Toner;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $toners_bajos = Toner::where('estado', 'disponible')
            ->select('modelo')
            ->groupBy('modelo')
            ->havingRaw('COUNT(*) < 3')
            ->pluck('modelo');

        return view('bienvenido', compact('toners_bajos'));
    }
}
