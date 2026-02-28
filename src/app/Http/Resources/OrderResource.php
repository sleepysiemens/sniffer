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
        $items = OrderItemResource::collection($this->items);

        return [
            'id'             => $this->id,
            'status'         => $this->status,
            'delivery_type'  => $this->delivery_type,
            'delivery_info'  => $this->delivery_info,
            'payment_type'   => $this->payment_type,
            'is_payed'       => $this->is_payed,
            'created_at'     => $this->created_at,
            'delivered_at'   => $this->delivered_at,
            'total_quantity' => $items->sum('quantity'),
            'total_price'    => $items->sum(function (OrderItemResource $item) {
                return $item['price_snapshot'] * $item['quantity'];
            }),
            'items'          => $items,
        ];
    }
}
