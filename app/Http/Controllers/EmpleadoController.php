<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Departamento;
use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Mail\CredencialesEmpleadoMail;
use Illuminate\Support\Facades\Mail;



class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = Empleado::query();

    if ($request->has('search')) {
        $search = $request->input('search');
        $query->where('nombre', 'like', "%{$search}%")
              ->orWhere('apellido', 'like', "%{$search}%");
    }

    $empleados = $query->paginate(10);
    $empleados = Empleado::where('activo', true)->get();
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
       // Validar el request como ya lo tienes
        $request->validate([
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'identificacion' => 'required|unique:empleados,identificacion',
        'email' => 'required|email|unique:users,email',
        // Otros campos...
        ]);

        // 1. Crear el empleado
        $empleado = Empleado::create([
        'nombre' => $request->nombre,
        'apellido' => $request->apellido,
        'identificacion' => $request->identificacion,
        'email' => $request->email,
        // Otros campos...
    ]);

      // 2. Crear automáticamente el usuario
    User::create([
        'name' => $empleado->nombre . ' ' . $empleado->apellido,
        'email' => $empleado->email,
        'password' => Hash::make($empleado->identificacion), // La contraseña será su número de ID
        'rol' => 'empleado', // o el rol que corresponda
        'id_empleado' => $empleado->id,
    ]);
    Mail::to($empleado->email)->send(new CredencialesEmpleadoMail(
        $empleado->nombre . ' ' . $empleado->apellido,
        $empleado->email,
        $empleado->identificacion // contraseña antes de encriptar
    ));

    return redirect()->route('empleados.index')->with('success', 'Empleado y usuario creados correctamente.');
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
    public function destroy(Empleado $empleado)
    {
        $empleado->update(['activo' => false]); // Desactiva el empleado en lugar de eliminarlo
        return redirect()->route('empleados.index')->with('success', 'Empleado desactivado correctamente.');
    }

    public function reactivar(Empleado $empleado)
    {
        $empleado->update(['activo' => true]);
        return redirect()->route('empleados.index')->with('success', 'Empleado reactivado correctamente.');
    } 

    public function buscar(Request $request)
{
    $query = $request->input('query');

    $empleados = Empleado::where('nombre', 'like', "%$query%")
                         ->orWhere('apellido', 'like', "%$query%")
                         ->orWhere('email', 'like', "%$query%")
                         ->get();

    return view('empleados.index', compact('empleados'));
}


    

}
