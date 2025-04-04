@extends('layouts.app')

@section('content')
<form action="{{ route('empleados.buscar') }}" method="GET">
    <input type="text" name="query" class="form-control" placeholder="Buscar empleado...">
    <button type="submit" class="btn btn-primary">Buscar</button>
</form>


<div class="container">
    <h1>Lista de Empleados</h1>
    <a href="{{ route('empleados.create') }}" class="btn btn-primary">Crear Nuevo Empleado</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Teléfono</th>
                <!--<th>Departamento</th>-->
                <!--<th>Cargo</th>-->
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->id }}</td>
                    <td>{{ $empleado->nombre }}</td>
                    <td>{{ $empleado->apellido }}</td>
                    <td>{{ $empleado->email }}</td>
                    <td>{{ $empleado->telefono }}</td>
                    <!--<td>{{ $empleado->departamento }}</td>-->
                    <!--<td>{{ $empleado->cargo }}</td>-->
                    <td>
                    <a href="{{ route('empleados.show', $empleado->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este empleado?')">Eliminar</button>
                        </form>
                    </td>
                    @if (!$empleado->activo)
                       <form action="{{ route('empleados.reactivar', $empleado->id) }}" method="POST">
                       @csrf
                       @method('PUT')
                       <button type="submit" class="btn btn-warning">Reactivar</button>
                       </form>
                    @endif
 
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

