<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});
// Listar productos
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Crear producto
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Eliminar producto
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');