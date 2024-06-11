<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::all();

        return $estudiantes;
    }
}