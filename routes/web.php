<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;


Route::group(['prefix' => 'api'], function () {
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::post('/products', [ProductController::class, 'store'])->middleware('auth');
    Route::put('/products/{id}', [ProductController::class, 'update'])->middleware('auth');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->middleware('auth');
});

Route::get('/', function () {
    $users = User::all();
    return view('welcome', compact('users'));
});

Route::get('/404', function () {
    return view('404');
});

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/checkout', function () {
    return view('checkout.index');
})->name('checkout');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/orders', [OrderController::class, 'store'])->middleware('auth');


Route::resource('products', ProductController::class);
Route::get('/{slug}', [ProductController::class, 'showBySlug'])->name('product.show');
