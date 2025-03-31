<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamentos';

    protected $fillable = ['nombre'];

    // Un departamento tiene muchos empleados
    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'departamento_id');
    }
}

