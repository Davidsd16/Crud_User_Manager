<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

// Definición de la fábrica CursoFactory, que extiende la clase Factory de Laravel
class CursoFactory extends Factory
{

    // Método para definir la estructura de los datos falsos que se generarán para los cursos
    public function definition(): array
    {
        // Retorna un array con la estructura de datos falsos para un curso
        return [
            // Genera un nombre de curso utilizando el generador de texto faker, limitado a dos palabras
            'nombre' => $this->faker->sentence(2),
            // Genera un número aleatorio entre 100 y 900 para las horas del curso
            'horas' => rand(100, 900)
        ];
    }
}
