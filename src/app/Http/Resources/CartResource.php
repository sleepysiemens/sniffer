<?php

namespace App\Http\Resources;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Cart */
class CartResource extends JsonResource
{
    /** @return array<string, mixed> */
    public function toArray(Request $request): array
    {
        $items = CartItemResource::collection($this->items);

        return [
            'items'          => $items,
            'total_quantity' => $items->sum('quantity'),
            'total_price'    => $items->sum(function (CartItemResource $item) {
                return $item['price_snapshot'] * $item['quantity'];
            }),
        ];
    }
}
