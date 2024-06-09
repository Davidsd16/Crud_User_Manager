<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Definición de la clase Curso que extiende la clase Model de Eloquent
class Curso extends Model
{
    // Uso del trait HasFactory para permitir la creación de instancias de modelo utilizando factories
    use HasFactory;

    // Nombre de la tabla en la base de datos asociada al modelo Curso
    public $table = "cursos";

    // Lista de atributos que pueden ser asignados en masa (mass assignable)
    protected $fillable = array("*");

    // Método para definir la relación muchos a muchos entre el modelo Curso y el modelo Estudiante
    public function estudiantes()
    {
        // Retorna la relación muchos a muchos definida con el modelo Estudiante y la tabla de pivote 'curso_estudiante'
        return $this->belongsToMany(Estudiante::class, 'curso_estudiante');
    }
}
