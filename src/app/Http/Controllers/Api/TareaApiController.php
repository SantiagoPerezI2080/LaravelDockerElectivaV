<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tareas = Tarea::get();
        return response()->json($tareas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $messages = [
            'estado.required' => 'El estado es obligatorio.',
            'estado.in' => 'El estado debe ser "pendiente" o "completada".',
        ];

        $request->validate([
            'estado' => 'required|in:pendiente,completada',
        ], $messages);

        $tareas = Tarea::create([
            'nombre'=> $request->nombre,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado,
            'fecha_vencimiento' => $request->fecha_vencimiento,
        ]);

        return response()->json($tareas);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tareas = Tarea::where('id', $id)-> first();
        return response()->json($tareas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $messages = [
            'estado.required' => 'El estado es obligatorio.',
            'estado.in' => 'El estado debe ser "pendiente" o "completada".',
        ];

        $request->validate([
            'estado' => 'sometimes|required|in:pendiente,completada',
        ], $messages);

        $tareas = Tarea::where('id', $id)->update([
            'nombre'=> $request->nombre,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado,
            'fecha_vencimiento' => $request->fecha_vencimiento,
        ]);

        return response()->json($tareas);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tareas = Tarea::where('id', $id)->delete();
        return response()->json($tareas);
    }
}
