<?php

use App\Http\Controllers\API\ProductController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'products'], function () {
    Route::get('', [ProductController::class, 'index'])->name('api.products.index');
    Route::get('{id}', [ProductController::class, 'show'])->name('api.products.index');
    Route::post('', [ProductController::class, 'store'])->name('api.products.store');
    Route::patch('{id}', [ProductController::class, 'update'])->name('api.products.update');
    Route::delete('{id}', [ProductController::class, 'delete'])->name('api.products.delete');
});
