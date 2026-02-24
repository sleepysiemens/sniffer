<?php

namespace App\Http\Resources;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Cart */
class CartResource extends JsonResource
{
    /** @return array<string, mixed> */
    public function toArray(Request $request): array
    {
        return [
            'items'          => CartItemResource::collection($this->items),
            'total_quantity' => $this->items->sum('quantity'),
            'total_price'    => $this->items->sum(fn (CartItem $item) => $item->price_snapshot * $item->quantity),
        ];
    }
}
