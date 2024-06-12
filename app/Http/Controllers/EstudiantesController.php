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

    public function store(Request $request)
    {/*
        $inputs = $request->all();  // Cambiado aquí
        $respuesta = Estudiante::create($inputs);
        return response()->json($respuesta, 201);
*/

     // Validar los datos de entrada
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:estudiantes,email',
        ]);

        // Crear un nuevo estudiante
        $estudiante = Estudiante::create($validatedData);

        // Retornar una respuesta (puede ser un JSON o redireccionar a una vista)
        return response()->json(['message' => 'Estudiante creado con éxito', 'estudiante' => $estudiante], 201);
        
    }
    
    public function update(Request $request, $id)
    {
        // Buscar el estudiante por ID
        $estudiante = Estudiante::find($id);

        // Verificar si el estudiante existe
        if (!$estudiante) {
            return response()->json([
                'error' => true,
                'mensaje' => 'No existe el estudiante',
            ], 404);
        }

        // Validar los datos de entrada
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'foto' => 'nullable|string|max:255', // Asumiendo que la foto puede ser opcional
        ]);

        // Actualizar los datos del estudiante
        $estudiante->nombre = $validatedData['nombre'];
        $estudiante->apellido = $validatedData['apellido'];
        $estudiante->foto = $validatedData['foto'];

        // Guardar los cambios y manejar la respuesta
        if ($estudiante->save()) {
            return response()->json([
                'data' => $estudiante,
                'mensaje' => 'Estudiante actualizado con éxito',
            ], 200);
        } else {
            return response()->json([
                'error' => true,
                'mensaje' => 'No se actualizó el estudiante',
            ], 500);
        }
    }


    public function show(Request $request, $id)
    {
        $estudiante = Estudiante::find($id);

        if (isset($estudiante)) {
            return response()->json([
                'data' => $estudiante,
                'mensaje' => 'Estudiante encontrado con éxito',
            ], 200);
        }else {
            return response()->json([
                'error' => true,
                'mensaje' => 'El estudiante no existe',
            ], 500);
        }
    }
}
