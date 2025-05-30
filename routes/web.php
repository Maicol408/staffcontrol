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
Route::resource('users', UsuarioController::class);
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

//editar un empleado
Route::get('empleados/{empleado}/edit', [EmpleadoController::class, 'edit'])->name('empleados.edit');

Route::get('/empleados/create', [EmpleadoController::class, 'create'])->name('empleados.create');

Route::get('/empleados/{empleado}', [EmpleadoController::class, 'show'])->name('empleados.show');

Route::post('/empleados', [EmpleadoController::class, 'store'])->name('empleados.store');

Route::put('/empleados/{empleado}', [EmpleadoController::class, 'update'])->name('empleados.update');

Route::put('/empleados/{empleado}/reactivar', [EmpleadoController::class, 'reactivar'])->name('empleados.reactivar');

Route::get('empleados/buscar', [EmpleadoController::class, 'buscar'])->name('empleados.buscar');

Route::get('/empleados', [EmpleadoController::class, 'index'])->name('empleados.index');

Route::middleware('auth')->group(function () {
    Route::get('/perfil', [EmpleadoController::class, 'perfil'])->name('empleado.perfil');
    Route::get('/empleados', [EmpleadoController::class, 'index'])->name('empleados.index');
});

