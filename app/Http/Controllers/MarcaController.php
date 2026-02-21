<?php

namespace App\Http\Controllers;

use App\Models\Marca;
//use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marcas = Marca::all();
        return response()->json($marcas, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255|unique:marcas',
            'estado' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

            $marca = Marca::create($request->all());

            return response()->json([
                'mensaje' => 'Marca creada exitosamente',
                'data' => $marca
            ], 201);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Marca $marca)
    {
        return response()->json($marca, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marca $marca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marca $marca)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255|unique:marcas,nombre,' . $marca->id,
            'estado' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
    }

        $marca->update($request->all());

        return response()->json([
            'mensaje' => 'Marca actualizada exitosamente',
            'data' => $marca
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marca $marca)
    {
        $marca->delete();

        return response()->json([
            'mensaje' => 'Marca eliminada exitosamente',
            'data' => $marca
        ], 200);
    }
}
