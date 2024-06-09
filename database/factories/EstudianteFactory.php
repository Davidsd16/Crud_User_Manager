<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

// Definición de la fábrica EstudianteFactory, que extiende la clase Factory de Laravel
class EstudianteFactory extends Factory
{

    // Método para definir la estructura de los datos falsos que se generarán para los estudiantes
    public function definition(): array
    {
        // Retorna un array con la estructura de datos falsos para un estudiante
        return [
            // Genera un nombre aleatorio utilizando el generador de nombres faker
            'nombre' => $this->faker->name(),
            // Genera un apellido aleatorio utilizando el generador de apellidos faker
            'apellido' => $this->faker->lastName(),
            // Genera un nombre aleatorio que simula ser una ruta de archivo de foto
            'foto' => $this->faker->name(),
        ];
    }
}
