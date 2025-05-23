<?php
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\CheckLogin;

use App\Http\Controllers\UserController;
use App\Http\Controllers\UbicationController;
use App\Http\Controllers\TonerController;
use App\Http\Controllers\ImpresoraController;
use App\Http\Controllers\CambioTonerController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('index');
});


Route::post('/', [UserController::class, 'login'])->name('user.login');
Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');

Route::middleware(CheckLogin::class)->group(function () {
    Route::get('/soporte/login', function () {
        return view('bienvenido');
    });
    
Route::get('/soporte', [HomeController::class, 'index'])->name('soporte.index');    
    // ubicaciones 

Route::get('/soporte/ubicaciones', [UbicationController::class, 'index'])->name('ubicaciones.index'); // Listar ubicaciones
Route::get('/soporte/ubicaciones/new', [UbicationController::class, 'create'])->name('ubicaciones.create'); // Formulario de creación
Route::post('/soporte/ubicaciones', [UbicationController::class, 'store'])->name('ubicaciones.store'); // Guardar nueva ubicación
Route::get('/soporte/ubicaciones/{id}/edit', [UbicationController::class, 'edit'])->name('ubicaciones.edit'); // Formulario de edición
Route::put('/soporte/ubicaciones/{id}', [UbicationController::class, 'update'])->name('ubicaciones.update'); // Actualizar ubicación
Route::delete('/soporte/ubicaciones/{id}', [UbicationController::class, 'destroy'])->name('ubicaciones.destroy'); // Eliminar ubicación


//toners 

Route::get('soporte/toners', [TonerController::class, 'index'])->name('toners.index');
Route::get('soporte/toners/create', [TonerController::class, 'create'])->name('toners.create');
Route::post('soporte/toners', [TonerController::class, 'store'])->name('toners.store');
Route::get('soporte/toners/{id}/edit', [TonerController::class, 'edit'])->name('toners.edit');
Route::put('soporte/toners/{id}', [TonerController::class, 'update'])->name('toners.update');
Route::delete('soporte/toners/{id}', [TonerController::class, 'destroy'])->name('toners.destroy');
Route::get('soporte/toners/{id}', [TonerController::class, 'show'])->name('toners.show');

//impresoras 

Route::get('soporte/impresoras', [ImpresoraController::class, 'index'])->name('impresoras.index');
Route::get('soporte/impresoras/create', [ImpresoraController::class, 'create'])->name('impresoras.create');
Route::post('soporte/impresoras', [ImpresoraController::class, 'store'])->name('impresoras.store');
Route::get('soporte/impresoras/{id}/edit', [ImpresoraController::class, 'edit'])->name('impresoras.edit');
Route::put('soporte/impresoras/{id}', [ImpresoraController::class, 'update'])->name('impresoras.update');
Route::delete('soporte/impresoras/{id}', [ImpresoraController::class, 'destroy'])->name('impresoras.destroy');
Route::get('soporte/impresoras/{id}', [ImpresoraController::class, 'show'])->name('impresoras.show');

//cambio de toner 

Route::get('soporte/cambios', [CambioTonerController::class, 'index'])->name('cambios.index');
Route::get('soporte/cambios/create', [CambioTonerController::class, 'create'])->name('cambios.create');
Route::post('soporte/cambios', [CambioTonerController::class, 'store'])->name('cambios.store');
Route::get('soporte/cambios/{id}', [CambioTonerController::class, 'show'])->name('cambios.show');
Route::post('soporte/cambios/filtrar', [CambioTonerController::class, 'filtrado'])->name('cambios.filtrar');

Route::get('soporte/cambios/impresora/{id}', [CambioTonerController::class, 'historial'])->name('cambios.historial');

Route::get('soporte/toners/modelo/{modelo}', [TonerController::class, 'listarPorModelo'])->name('toners.modelo');
    
});


