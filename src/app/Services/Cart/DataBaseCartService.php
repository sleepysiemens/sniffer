<?php

namespace App\Services\Cart;

use App\Exceptions\StockLimitException;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Throwable;

class DataBaseCartService extends AbstractCartService implements CartServiceInterface
{
    public function getCart(): CartResource
    {
        return Cache::tags(['carts'])->remember(
            'cart:user_' . auth()->user()->id,
            360,
            fn() =>new CartResource($this->getOrCreateCart()),
        );
    }

    /** @throws StockLimitException|Throwable */
    public function incrementItem(string $productId): void
    {
        $product = $this->productService->getById($productId);

        throw_if(
            $product->stock_amount < 1,
            new StockLimitException()
        );

        DB::transaction(function () use ($product) {
            $cart = $this->getOrCreateCart();
            $item = $cart->items->where('product_id', $product->id)->first();

            if (! $item) {
                $cart->items()->create([
                    'product_id'     => $product->id,
                    'price_snapshot' => $product->price,
                ]);

                return;
            }

            $newQuantity = $item['quantity'] + 1;

            throw_if(
                $product->stock_amount < $newQuantity,
                new StockLimitException()
            );

            $item->increment('quantity');
        });
    }

    public function decrementItem(string $productId): void
    {
        DB::transaction(function () use ($productId) {
            $cart = $this->getOrCreateCart();
            $item = $cart->items->firstWhere('product_id', $productId);

            if (! $item) {
                return;
            }

            if ($item->quantity <= 1) {
                $this->removeItem($productId);

                return;
            }

            $item->decrement('quantity');
        });
    }

    public function removeItem(string $productId): void
    {
        DB::transaction(function () use ($productId) {
            $cart = $this->getOrCreateCart();
            $item = $cart->items->firstWhere('product_id', $productId);

            if (! $item) {
                return;
            }

            $item->delete();
        });
    }

    public function clearCart(): void
    {
        DB::transaction(function () {
            $cart = $this->getOrCreateCart();
            $cart->items()->delete();

            #todo Event
            Cache::tags(['carts'])->forget('cart:user_' . auth()->user()->id);
        });
    }

    private function getOrCreateCart(): Cart
    {
        return auth()->user()
            ->cart()
            ->firstOrCreate()
            ->load([
                'items' => fn (Builder|HasMany $q) => $q->orderBy('created_at'),
                'items.product',
            ]);
    }
}
