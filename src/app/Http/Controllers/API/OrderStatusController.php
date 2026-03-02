<?php

namespace App\Http\Controllers\API;


use App\Enums\OrderStatus;
use Illuminate\Support\Collection;

class OrderStatusController extends AbstractDeliveryInfoController
{
    public function getData(): Collection
    {
        return collect(OrderStatus::cases())->map(fn(OrderStatus $case) => [
            'value' => $case->value,
            'label' => $case->label()
        ]);
    }
}
