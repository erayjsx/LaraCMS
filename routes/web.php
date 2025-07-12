<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/', function () {
    $users = User::all();
    return view('welcome', compact('users'));
});

Route::prefix('system')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login');
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
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});
