<?php

namespace App\Http\Resources;

use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin OrderItem */
class OrderItemResource extends JsonResource
{
    /** @return array<string, mixed> */
    public function toArray(Request $request): array
    {
        $res = [
            'id'             => $this->id,
            'order_id'       => $this->order_id,
            'product_id'     => $this->product_id,
            'quantity'       => $this->quantity,
            'price_snapshot' => $this->price_snapshot,
        ];

        if ($this->relationLoaded('product')) {
            $res['product'] = new ProductResource($this->product);
        }

        return $res;
    }
}
