<?php

use App\Http\Controllers\AJAX\CartController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'cart'], function (){
    Route::get('', [CartController::class, 'getCart'])->name('ajax.cart.get');
    Route::delete('', [CartController::class, 'clearCart'])->name('ajax.cart.clear');

    Route::post('{product_id}/increment', [CartController::class, 'incrementItem'])->name('ajax.cart.increment');
    Route::post('{product_id}/decrement', [CartController::class, 'decrementItem'])->name('ajax.cart.decrement');
    Route::delete('{product_id}', [CartController::class, 'deleteItem'])->name('ajax.cart.delete_item');
});
