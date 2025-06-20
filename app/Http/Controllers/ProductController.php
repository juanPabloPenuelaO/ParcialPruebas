<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');

        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        return response()->json($query->get(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id'
        ]);

        $product = Product::create($validated);

        return response()->json($product, 201);
    }

    public function show(Product $product)
    {
        return response()->json($product->load('category'), 200);
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string',
            'price' => 'sometimes|numeric',
            'stock' => 'sometimes|integer|min:0',
            'category_id' => 'sometimes|exists:categories,id'
        ]);

        $product->update($validated);

        return response()->json($product, 200);
    }

public function destroy(Product $product)
{
    $product->delete();

    return redirect()->route('products.index');
}

    public function lowStock()
    {
        $products = Product::where('stock', '<', 10)->get();

        return response()->json($products, 200);
    }
}