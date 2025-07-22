<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SlugController;

Route::get('/', function () {
    $users = User::all();
    return view('welcome', compact('users'));
});

Route::get('/404', function () {
    return view('404');
});

Route::get('/checkout', function () {
    return view('checkout.index');
})->name('checkout');


Route::middleware(['guest'])->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');
});

Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::post('/orders', [OrderController::class, 'store'])->middleware('auth');
    Route::get('/me', function () {
        return view('me.index');
    })->name('me');
});

Route::resource('products', ProductController::class);
Route::get('/{slug}', [SlugController::class, 'resolve'])->name('slug.resolve');
