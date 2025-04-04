<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Departamento;
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
    $departamentos = Departamento::all(); // Obtener los departamentos
    $cargos = Cargo::all(); // Obtener los cargos

    return view('empleados.create', compact('departamentos', 'cargos'));
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
        'departamento_id' => 'required|exists:departamentos,id',
        'cargo_id' => 'required|exists:cargos,id', // Asegurar que existe en la tabla `cargos`
    ]);

    Empleado::create([
        'nombre' => $request->nombre,
        'apellido' => $request->apellido,
        'email' => $request->email,
        'telefono' => $request->telefono,
        'departamento_id' => $request->departamento_id,
        'cargo_id' => $request->cargo_id,
    ]);

    return redirect()->route('empleados.index')->with('success', 'Empleado creado exitosamente');
}

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    { 
      return view('empleados.show', compact('empleado'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }
    
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:empleados,email,' . $empleado->id,
            'telefono' => 'required|string|max:20',
            'departamento_id' => 'required|exists:departamentos,id',
            'cargo_id' => 'required|exists:cargos,id',
        ]);
    
        $empleado->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'departamento_id' => $request->departamento_id,
            'cargo_id' => $request->cargo_id,
        ]);
    
        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
