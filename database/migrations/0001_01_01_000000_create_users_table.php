<?php

// Importar las clases necesarias de Laravel para migraciones de base de datos
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Crear una instancia anónima de Migration para definir la migración
return new class extends Migration
{
    // Método para definir los cambios que se aplicarán al ejecutar la migración
    public function up(): void
    {
        // Crear una nueva tabla llamada 'users' con los siguientes campos
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Campo de identificación única
            $table->string('first_name'); // Campo para el primer nombre del usuario
            $table->string('last_name'); // Campo para el apellido del usuario
            $table->string('email')->unique(); // Campo para el correo electrónico único del usuario
            $table->string('password'); // Campo para la contraseña del usuario
            $table->timestamps(); // Campos de marca de tiempo 'created_at' y 'updated_at'
        });
    }

    // Método para revertir los cambios realizados por la migración en caso de ser necesario
    public function down(): void
    {
        // Eliminar la tabla 'users' si existe
        Schema::dropIfExists('users');
    }
};
