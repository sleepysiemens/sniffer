<?php

namespace App\Http\Controllers\API;

use App\Enums\DeliveryType;
use Illuminate\Support\Collection;

class DeliveryTypeController extends AbstractDeliveryInfoController
{
    public function getData(): Collection
    {
        return collect(DeliveryType::cases())->map(fn(DeliveryType $case) => [
            'value' => $case->value,
            'label' => $case->label()
        ]);
    }
}
