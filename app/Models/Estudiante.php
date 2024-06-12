<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Definición de la clase Estudiante que extiende la clase Model de Eloquent
class Estudiante extends Model
{
    // Uso del trait HasFactory para permitir la creación de instancias de modelo utilizando factories
    use HasFactory;

    // Nombre de la tabla en la base de datos asociada al modelo Estudiante
    public $table = "estudiantes";

    // Lista de atributos que pueden ser asignados en masa (mass assignable)
    protected $fillable = [
        'id',
        'nombre',
        'apellido',
        'foto',
    ];

    // Método para definir la relación muchos a muchos entre el modelo Estudiante y el modelo Curso
    public function cursos()
    {
        // Retorna la relación muchos a muchos definida con el modelo Curso y la tabla de pivote 'curso_estudiante'
        return $this->belongsToMany(Curso::class, 'curso_estudiante');
    }
}
