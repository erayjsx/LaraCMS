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

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/orders', [OrderController::class, 'store'])->middleware('auth');


Route::resource('products', ProductController::class);
Route::get('/{slug}', [ProductController::class, 'showBySlug'])->name('product.show');



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
