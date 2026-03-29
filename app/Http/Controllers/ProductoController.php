<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Listar todos los productos (que no han sido eliminados)
     */
    public function index()
    {
        $productos = Producto::with(['marca', 'proveedor'])->get();
        
        return response()->json([
            'status' => true,
            'data' => $productos
        ], 200);
    }

    /**
     * Guardar un nuevo producto
     */
   public function store(Request $request)
{
    try {
        $producto = new \App\Models\Producto();
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->stock  = $request->stock;
        $producto->marca_id = $request->marca_id;
        $producto->proveedor_id = $request->proveedor_id;
        
        $producto->estado = true; 
        
        $producto->save();

        return response()->json([
            'status' => true,
            'data' => $producto
        ], 201);

    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => $e->getMessage()
        ], 500);
    }
}   

    /**
     * Mostrar un producto específico
     */
    public function show($id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['status' => false, 'message' => 'No encontrado'], 404);
        }

        return response()->json(['status' => true, 'data' => $producto], 200);
    }

    /**
     * Actualizar producto
     */
    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['status' => false, 'message' => 'No encontrado'], 404);
        }

        $producto->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Producto actualizado',
            'data' => $producto
        ], 200);
    }

    /**
     * Eliminar producto (Soft Delete)
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['status' => false, 'message' => 'No encontrado'], 404);
        }

        $producto->delete(); 

        return response()->json([
            'status' => true,
            'message' => 'Producto eliminado correctamente (Soft Delete)'
        ], 200);
    }
}