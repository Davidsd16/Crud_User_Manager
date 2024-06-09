<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\Estudiante;
use App\Models\User;

use Illuminate\Database\Seeder;

// El seeder DatabaseSeeder se utiliza para poblar la base de datos con datos de prueba
class DatabaseSeeder extends Seeder
{

    // El método run() se ejecuta cuando se ejecuta el seeder
    public function run(): void
    {
        // Crea 15 estudiantes utilizando el factory de Estudiante
        Estudiante::factory()->times(15)->create();

        // Crea 8 cursos utilizando el factory de Curso
        // Luego, para cada curso, asocia aleatoriamente 3 estudiantes
        Curso::factory()->times(8)->create()->each(function($curso){
            $curso->estudiantes()->sync(
                Estudiante::all()->random(3)
            );
        });
    }
}
