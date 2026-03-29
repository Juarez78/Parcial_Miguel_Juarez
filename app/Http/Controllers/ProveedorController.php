<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedor::all();
        return response()->json($proveedores, 200);
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
            'nombre' => 'required|string|max:255|unique:proveedores|min:3',
            'telefono' => 'nullable|string|max:255',
            'estado' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'mensaje' => 'Error al crear el proveedor'

            ], 422);
        }
            $proveedor = Proveedor::create($request->all());

            return response()->json([
                'mensaje' => 'Proveedor creado exitosamente',
                'data' => $proveedor
            ], 201);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedor)
    {
        return response()->json($proveedor, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $proveedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) // <-- Cambia "Proveedor $proveedor" por "$id"
{
    // 1. Buscamos al proveedor manualmente por su ID
    $proveedor = Proveedor::find($id);

    // 2. Si no existe, avisamos de inmediato
    if (!$proveedor) {
        return response()->json([
            'status' => false,
            'mensaje' => 'Proveedor no encontrado'
        ], 404);
    }

    // 3. Validamos los datos
    $validator = Validator::make($request->all(), [
        // Usamos $id para la excepción del unique
        'nombre' => 'required|string|max:255|unique:proveedores,nombre,' . $id,
        'telefono' => 'nullable|string|max:255',
        'estado' => 'required', 
    ]);

    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ], 422);
    }

    // 4. Ahora sí, actualizamos el objeto único
    $proveedor->update($request->all());

    return response()->json([
        'mensaje' => 'Proveedor actualizado exitosamente',
        'data' => $proveedor
    ], 200);
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $proveedor = Proveedor::find($id);
        if (!$proveedor) {
            return response()->json([
                'status' => false,
                'mensaje' => 'Proveedor no encontrado'
            ], 404);
        }
        
        $proveedor->delete();
        
        return response()->json([
            'mensaje' => 'Proveedor eliminado exitosamente',
            'data' => $proveedor
        ], 200);
    }
}
