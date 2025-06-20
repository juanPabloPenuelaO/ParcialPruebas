<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Mostrar todas las categorías.
     */
    public function index()
    {
        return response()->json(Category::all());
    }

    /**
     * Crear una nueva categoría.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $categoria = Category::create($datos);

        return response()->json($categoria, 201);
    }

    /**
     * Mostrar una categoría específica.
     */
    public function show(string $id)
    {
        $categoria = Category::findOrFail($id);

        return response()->json($categoria);
    }

    /**
     * Actualizar una categoría existente.
     */
    public function update(Request $request, string $id)
    {
        $categoria = Category::findOrFail($id);

        $datos = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $categoria->update($datos);

        return response()->json($categoria);
    }

    /**
     * Eliminar una categoría.
     */
    public function destroy(string $id)
    {
        $categoria = Category::findOrFail($id);
        $categoria->delete();

        return response()->json(['mensaje' => 'Categoría eliminada correctamente'], 204);
    }
}