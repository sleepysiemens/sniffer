<?php

namespace App\Services\Cart;

use App\Http\Resources\CartResource;

class CartService implements CartServiceInterface
{
    public function driver(): DataBaseCartService|SessionCartService
    {
        return auth()->check()
            ? app(DataBaseCartService::class)
            : app(SessionCartService::class);
    }
    public function getCart(): CartResource
    {
        return $this->driver()->getCart();
    }

    public function incrementItem(string $productId): void
    {
        $this->driver()->incrementItem($productId);
    }

    public function decrementItem(string $productId): void
    {
        $this->driver()->decrementItem($productId);
    }

    public function removeItem(string $productId): void
    {
        $this->driver()->removeItem($productId);
    }

    public function clearCart(): void
    {
        $this->driver()->clearCart();
    }
}
