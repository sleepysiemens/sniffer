<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ProductController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'products'], function () {
    Route::get('', [ProductController::class, 'index'])->name('api.products.index');
    Route::get('latest', [ProductController::class, 'getLatest'])->name('api.products.latest');


    Route::get('{id}', [ProductController::class, 'show'])->name('api.products.show');
    Route::post('', [ProductController::class, 'store'])->name('api.products.store');
    Route::patch('{id}', [ProductController::class, 'update'])->name('api.products.update');
    Route::delete('{id}', [ProductController::class, 'delete'])->name('api.products.delete');
});

Route::group(['prefix' => 'categories'], function () {
    Route::get('', [CategoryController::class, 'index'])->name('api.categories.index');
    Route::get('{id}', [CategoryController::class, 'show'])->name('api.categories.show');
    Route::post('', [CategoryController::class, 'store'])->name('api.categories.store');
    Route::patch('{id}', [CategoryController::class, 'update'])->name('api.categories.update');
    Route::delete('{id}', [CategoryController::class, 'delete'])->name('api.categories.delete');
});
