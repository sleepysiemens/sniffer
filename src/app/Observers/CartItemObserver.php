<?php

namespace App\Observers;

use App\Models\CartItem;
use Illuminate\Support\Facades\Cache;

class CartItemObserver
{
    public function created(CartItem $cartItem): void
    {
        $this->invalidateCache($cartItem);
    }

    public function updated(CartItem $cartItem): void
    {
        $this->invalidateCache($cartItem);
    }

    public function deleted(CartItem $cartItem): void
    {
        $this->invalidateCache($cartItem);
    }

    private function invalidateCache(CartItem $item): void
    {
        $cart = $item->cart()->first();
        $userId = $cart?->user_id;

        if (! $cart || ! $userId) {
            return;
        }

        Cache::tags(['carts'])->forget('cart:user_' . $userId);
    }
}
