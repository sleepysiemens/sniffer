<?php

namespace App\Services\Cart;

use App\Exceptions\StockLimitException;
use App\Http\Resources\CartResource;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use Throwable;

class SessionCartService extends AbstractCartService implements CartServiceInterface
{
    public function getCart(): CartResource
    {
        $cart = (object) [
            'items' => collect(Session::get(self::SESSION_KEY, [])),
        ];

        return new CartResource($cart);
    }

    /** @throws StockLimitException|Throwable */
    public function incrementItem(string $productId): void
    {
        $product = $this->productService->getById($productId);

        throw_if(
            $product->stock_amount < 1,
            new StockLimitException()
        );

        $key = self::SESSION_KEY . '.' . $productId;
        $item = Session::get($key, []);

        if (! $item) {

            $item = [
                'product_id'     => $productId,
                'quantity'       => 1,
                'price_snapshot' => $product->price,
            ];

            Session::put($key, $item);

            return;
        }

        $newQuantity = $item['quantity'] + 1;

        throw_if(
            $product->stock_amount < $newQuantity,
            new StockLimitException()
        );

        Session::increment($key . '.quantity');
    }

    public function decrementItem(string $productId): void
    {
        $key = self::SESSION_KEY . '.' . $productId;
        $item = Session::get($key, []);

        if (! $item) {
            return;
        }

        if ($item['quantity'] <= 1) {
            $this->removeItem($productId);

            return;
        }

        Session::decrement($key . '.quantity');
    }

    public function removeItem(string $productId): void
    {
        $items = Session::get(self::SESSION_KEY, []);

        if (! Arr::has($items, $productId)) {
            return;
        }

        Arr::forget($items, $productId);
        Session::put(self::SESSION_KEY, $items);
    }

    public function clearCart(): void
    {
        Session::forget(self::SESSION_KEY);
    }
}
