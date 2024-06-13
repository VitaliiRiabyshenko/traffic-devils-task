<?php

use App\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false
]);

Route::middleware('auth')->group(function () {
    Route::get('/register', [App\Http\Controllers\UserRegisterController::class, 'create'])->name('register');
    Route::post('/register', [App\Http\Controllers\UserRegisterController::class, 'store'])->name('register');

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('products', App\Http\Controllers\ProductController::class)
        ->except(['show', 'edit', 'update', 'destroy', 'index'])
        ->middleware('can:add_product');
});
