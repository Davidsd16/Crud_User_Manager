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
        // Crea una nueva tabla llamada 'cursos' en la base de datos
        Schema::create('cursos', function (Blueprint $table) {
            // Define un campo autoincremental para la clave primaria
            $table->id();
            // Agrega un campo para el nombre del curso
            $table->string('nombre');
            // Agrega un campo para el número de horas del curso
            $table->integer('horas');
            // Agrega automáticamente los campos 'created_at' y 'updated_at' para el registro de timestamps
            $table->timestamps();
        });
    }

    // Método para definir las operaciones que se deben realizar cuando se revierte la migración
    public function down(): void
    {
        // Elimina la tabla 'cursos' si existe
        Schema::dropIfExists('cursos');
    }
};
