<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Carrito;
use Illuminate\Http\Request;

class CarritoApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carritos = Carrito::get();
        return response()->json($carritos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $carritos = Carrito::create([
            'usuario_id'=> $request->usuario_id,
            'producto_id' => $request->producto_id,
            'cantidad' => $request->cantidad,
            'fecha_agregado' => $request->fecha_agregado,
        ]);

        return response()->json($carritos);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $carritos = Carrito::where('id', $id)-> first();
        return response()->json($carritos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $carritos = Carrito::where('id', $id)->update([
            'usuario_id'=> $request->usuario_id,
            'producto_id' => $request->producto_id,
            'cantidad' => $request->cantidad,
            'fecha_agregado' => $request->fecha_agregado,
        ]);

        return response()->json($carritos);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $carritos = Carrito::where('id', $id)->delete();

        return response()->json($carritos);
    }
}
