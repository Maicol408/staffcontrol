<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // ✅ Importar Auth
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\HomeController; // ✅ Importar HomeController

// ✅ Rutas con Resource Controllers (Eliminar duplicados)
Route::resource('empleados', EmpleadoController::class);
Route::resource('usuarios', UsuarioController::class);
Route::resource('cargos', CargoController::class);
Route::resource('departamentos', DepartamentoController::class);
Route::resource('asistencias', AsistenciaController::class);

// ✅ Página de inicio
Route::get('/', function () {
    return view('welcome');
});

// ✅ Ruta protegida con middleware de autenticación
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

// ✅ Rutas de autenticación generadas por Laravel
Auth::routes();

// ✅ Ruta del home después del login
Route::get('/home', [HomeController::class, 'index'])->name('home');

