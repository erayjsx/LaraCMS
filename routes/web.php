<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    $users = User::all();
    return view('welcome', compact('users'));
});

Route::resource('products', ProductController::class);
Route::get('/product/{id}', function ($id) {
    return view('product', compact('id'));
});

Route::post('/orders', [OrderController::class, 'store'])->middleware('auth');
Route::get('/cart', function () {
    return view('cart');
})->name('cart');


Route::get('/404', function () {
    return view('404');
});

Route::prefix('system')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('system.login');
        Route::post('/login', [AuthController::class, 'login'])->name('system.login.submit');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/', function () {
            return view('system.index');
        });
        Route::get('/content', function () {
            return view('system.content');
        });
        Route::get('/settings', function () {
            return view('system.settings.index');
        });
        //Route::post('/logout', [AuthController::class, 'logout'])->name('system.logout');
    });
});
