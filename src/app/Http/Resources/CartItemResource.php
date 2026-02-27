<?php

namespace App\Http\Resources;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin CartItem */
class CartItemResource extends JsonResource
{
    /** @return array<string, mixed> */
    public function toArray(Request $request): array
    {
        if (is_array($this->resource)) {
            return [
                'product_id' => $this['product_id'],
                'name'       => $this['product_name'],
                'price'      => $this['price_snapshot'],
                'quantity'   => $this['quantity'],
                'total'      => $this['price_snapshot'] * $this['quantity'],
            ];
        }

        return [
            'product_id' => $this->product_id,
            'name'       => $this->product->name,
            'price'      => $this->price_snapshot,
            'quantity'   => $this->quantity,
            'total'      => $this->price_snapshot * $this->quantity,
        ];
    }
}
