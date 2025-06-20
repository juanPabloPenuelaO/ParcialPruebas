<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Movement;
use Illuminate\Http\Request;

class MovementController extends Controller
{
    /**
     * Registrar un movimiento de inventario (entrada o salida).
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:entrada,salida',
            'quantity' => 'required|integer|min:1',
        ]);

        $producto = Product::findOrFail($datos['product_id']);

        if ($datos['type'] === 'salida') {
            if ($producto->stock < $datos['quantity']) {
                return response()->json([
                    'mensaje' => 'Stock insuficiente para realizar la salida.'
                ], 400);
            }

            $producto->stock -= $datos['quantity'];
        } else {
            $producto->stock += $datos['quantity'];
        }

        $producto->save();

        $movimiento = Movement::create([
            'product_id' => $producto->id,
            'type' => $datos['type'],
            'quantity' => $datos['quantity'],
        ]);

        return response()->json([
            'mensaje' => 'Movimiento registrado correctamente.',
            'movimiento' => $movimiento,
            'stock_actual' => $producto->stock
        ], 201);
    }
}