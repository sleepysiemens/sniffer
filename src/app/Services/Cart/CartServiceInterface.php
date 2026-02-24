<?php

namespace App\Services\Cart;

use App\Http\Resources\CartResource;

interface CartServiceInterface
{
    public function getCart(): CartResource;

    public function incrementItem(string $productId): void;

    public function decrementItem(string $productId): void;

    public function removeItem(string $productId): void;

    public function clearCart(): void;
}
