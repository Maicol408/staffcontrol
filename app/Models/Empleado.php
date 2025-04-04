<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleados';

    protected $fillable = ['nombre', 'apellido', 'email', 'telefono', 'departamento_id', 'cargo_id', 'activo'];

    // Un empleado tiene un usuario
    public function usuario()
    {
        return $this->hasOne(User::class, 'id_empleado');
    }

    // Un empleado pertenece a un departamento
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }

    // Un empleado tiene un cargo
    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'cargo_id');
    }

    // Un empleado tiene muchas asistencias
    public function asistencias()
    {
        return $this->hasMany(Asistencia::class, 'id_empleado');
    }
}

