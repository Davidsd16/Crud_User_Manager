<?php

use App\Http\Controllers\EstudiantesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/estudiantes', [EstudiantesController::class, 'index']);

Route::get('/estudiante', [EstudiantesController::class, 'store']);

// Route::apiResource('v1/estudiante', [EstudiantesController::class]);


