<?php

namespace App\Http\Resources;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Order */
class OrderResource extends JsonResource
{
    /** @return array<string, mixed> */
    public function toArray(Request $request): array
    {
        $res = [
            'id'             => $this->id,
            'status'         => $this->status,
            'delivery_type'  => $this->delivery_type,
            'delivery_info'  => $this->delivery_info,
            'payment_method' => $this->payment_type,
            'is_payed'       => $this->is_payed,
            'created_at'     => $this->created_at->format('Y.m.d H:i:s'),
            'delivered_at'   => $this->delivered_at?->format('Y.m.d H:i:s'),
            'total_quantity' => $this->total_quantity,
            'total_price'    => $this->total_price,
        ];

        if ($this->relationLoaded('items')) {
            $items = OrderItemResource::collection($this->items);
            $res['items'] = $items;
        }

        return $res;
    }
}
