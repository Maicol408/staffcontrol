@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Empleado</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $empleado->nombre }} {{ $empleado->apellido }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $empleado->email }}</p>
            <p class="card-text"><strong>Teléfono:</strong> {{ $empleado->telefono }}</p>
            <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
