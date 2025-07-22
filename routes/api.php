<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::post('/products', [ProductController::class, 'store'])->middleware('auth');
Route::put('/products/{id}', [ProductController::class, 'update'])->middleware('auth');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->middleware('auth');
