<?php

namespace App\Services\Cart;

use App\Exceptions\StockLimitException;
use App\Http\Resources\CartResource;
use App\Models\CartItem;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Throwable;

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

    /**
     * @throws StockLimitException|Throwable
     */
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

    public function mergeSessionWithDatabase(): void
    {
        $sessionCartService = app(SessionCartService::class);
        $dataBaseCartService = app(DataBaseCartService::class);

        DB::transaction(function () use ($sessionCartService, $dataBaseCartService) {
            $sessionCartItems = $sessionCartService->getCart()->items;

            if (empty($sessionCartItems)) {
                return;
            }

            $dbCart = $dataBaseCartService->getCart();

            $dbCartItems = $dbCart->items
                ->keyBy('product_id')
                ->toArray();

            $sessionCartItems = collect($sessionCartItems)
                ->map(fn (array $item) => [
                    'cart_id'          => $dbCart->id,
                    'product_id'       => $item['product_id'],
                    'quantity'         => $item['quantity'],
                    'price_snapshot'   => $item['price_snapshot'],
                ])
                ->keyBy('product_id')
                ->toArray();

            $itemsToInsert = array_diff_key($sessionCartItems, $dbCartItems);
            $dbCart->items()->insert($itemsToInsert);

            if (empty($dbCartItems)) {
                return;
            }

            $itemsForUpdate = array_diff_key($sessionCartItems, $itemsToInsert);

            foreach ($itemsForUpdate as $productId => $item) {
                if ($item['quantity'] > $dbCartItems[$productId]['quantity']) {
                    CartItem::query()->where('id', $dbCartItems[$productId]['id'])->update(['quantity' => $item['quantity']]);
                }
            }

            $sessionCartService->clearCart();
            Cache::tags(['carts'])->forget('cart:user_' . auth()->user()->id);
        });
    }
}
