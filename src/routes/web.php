<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\CartController;
use App\Http\Controllers\Web\OrderController;
use App\Http\Controllers\Web\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'products'], function () {
    Route::get('', [ProductController::class, 'index'])->name('products.index');
    Route::get('{id}', [ProductController::class, 'show'])->name('products.show');
});

Route::group(['prefix' => 'cart', 'middleware' => 'auth'], function () {
    Route::get('', [CartController::class, 'index'])->name('cart.index');
});

Route::group(['prefix' => 'order', 'middleware' => 'auth'], function () {
    Route::post('', [OrderController::class, 'store'])->name('order.store');
    Route::patch('{id}', [OrderController::class, 'update'])->name('order.update');
    Route::get('{id}', [OrderController::class, 'show'])->name('order.show');
});

require __DIR__.'/auth.php';
