<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return response()->json($categorias, 200);
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
            'nombre' => 'required|string|max:255|unique:categorias',
            'estado' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $categoria = Categoria::create($request->all());

        return response()->json([
            'mensaje' => 'Categoria creada exitosamente',
            'data' => $categoria
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        return response()->json($categoria, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255|unique:categorias,nombre,' . $categoria->id,
            'estado' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $categoria->update($request->all());

        return response()->json([
            'mensaje' => 'Categoria actualizada exitosamente',
            'data' => $categoria
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        
        return response()->json([
            'mensaje' => 'Categoria eliminada exitosamente',
            'data' => $categoria
        ], 200);
    }
}
