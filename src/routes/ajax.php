<?php

use App\Http\Controllers\AJAX\CartController;
use App\Http\Controllers\AJAX\OrderController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'cart'], function () {
    Route::get('', [CartController::class, 'getCart'])->name('ajax.cart.get');
    Route::delete('', [CartController::class, 'clearCart'])->name('ajax.cart.clear');

    Route::post('{product_id}/increment', [CartController::class, 'incrementItem'])->name('ajax.cart.increment');
    Route::post('{product_id}/decrement', [CartController::class, 'decrementItem'])->name('ajax.cart.decrement');
    Route::delete('{product_id}', [CartController::class, 'deleteItem'])->name('ajax.cart.delete_item');
});

Route::group(['prefix' => 'order'], function () {
    Route::get('', [OrderController::class, 'getAll'])->name('ajax.order.get');
    Route::post('', [OrderController::class, 'createOrder'])->name('ajax.order.store');

    Route::get('{id}', [OrderController::class, 'show'])->name('ajax.order.show');
    Route::patch('{id}/update', [OrderController::class, 'update'])->name('ajax.order.update');
});
