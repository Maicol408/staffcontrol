<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;



class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::all();
        return view('empleados.index', compact('empleados'));
    }
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleados.create'); // Verifica que esta ruta de vista exista
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'email' => 'required|email|unique:empleados,email',
        'telefono' => 'required|string|max:20',
    ]);

    Empleado::create([
        'nombre' => $request->nombre,
        'apellido' => $request->apellido,
        'email' => $request->email,
        'telefono' => $request->telefono,
    ]);

    return redirect()->route('empleados.index')->with('success', 'Empleado creado correctamente.');
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
        return view('empleados.edit'); // Verifica que esta ruta de vista exista
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
