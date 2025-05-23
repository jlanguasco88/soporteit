<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request){
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Ingrese Usuario',
            'password.required' => 'Ingrese Contraseña',
        ]);
    
        // Intentamos autenticar al usuario con el username y la contraseña
        if (Auth::attempt(['username' => $data['username'], 'password' => $data['password']])) {
            // Si es exitoso, redirigimos al usuario al dashboard o página protegida
            return redirect()->intended('/soporte');
        }
    
        // Si el login falla, devolvemos un error
        return back()->withErrors(['username' => 'Credenciales no válidas'])->withInput($request->only('username'));
    }

    public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate(); // invalida la sesión actual
    $request->session()->regenerateToken(); // previene CSRF

    return redirect('/');
}
}
