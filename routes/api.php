<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovementController;

// productos
Route::apiResource('products', ProductController::class);

// categoias
Route::apiResource('categories', CategoryController::class);

// movimientos stock
Route::post('/movements', [MovementController::class, 'store']);

// productos stock bajo
Route::get('/low-stock', [ProductController::class, 'lowStock']);
Route::get('/products-low-stock', [ProductController::class, 'lowStock']);