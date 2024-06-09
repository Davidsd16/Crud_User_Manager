<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Define una nueva migración utilizando la clase Migration proporcionada por Laravel
return new class extends Migration
{
    // Método para definir las operaciones que se deben realizar cuando se aplica la migración
    public function up(): void
    {
        // Crea una nueva tabla de relación llamada 'curso_estudiante' en la base de datos
        Schema::create('curso_estudiante', function (Blueprint $table) {
            // Define un campo autoincremental para la clave primaria
            $table->id();
            // Define un campo para almacenar el ID del curso relacionado
            $table->unsignedBigInteger('curso_id');
            // Define una clave foránea para el campo 'curso_id' que referencia la tabla 'cursos' y se elimina en cascada
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
            // Define un campo para almacenar el ID del estudiante relacionado
            $table->unsignedBigInteger('estudiante_id');
            // Define una clave foránea para el campo 'estudiante_id' que referencia la tabla 'estudiantes' y se elimina en cascada
            $table->foreign('estudiante_id')->references('id')->on('estudiante')->onDelete('cascade');
            // Agrega automáticamente los campos 'created_at' y 'updated_at' para el registro de timestamps
            $table->timestamps();
        });
    }

    // Método para definir las operaciones que se deben realizar cuando se revierte la migración
    public function down(): void
    {
        // Elimina la tabla 'curso_estudiante' si existe
        Schema::dropIfExists('curso_estudiante');
    }
};
