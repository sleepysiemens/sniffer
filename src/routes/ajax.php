<?php

use App\Http\Controllers\API\CartController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'cart'], function (){
    Route::get('', [CartController::class, 'getCart'])->name('api.cart.get');
    Route::delete('', [CartController::class, 'clearCart'])->name('api.cart.clear');

    Route::patch('{product_id}/increment', [CartController::class, 'incrementItem'])->name('api.cart.increment');
    Route::patch('{product_id}/decrement', [CartController::class, 'decrementItem'])->name('api.cart.decrement');
    Route::delete('{product_id}', [CartController::class, 'deleteItem'])->name('api.cart.delete_item');
});
