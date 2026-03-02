<?php

namespace App\Http\Controllers\API;

use App\Enums\PaymentType;
use Illuminate\Support\Collection;

class PaymentTypeController extends AbstractDeliveryInfoController
{
    public function getData(): Collection
    {
        return collect(PaymentType::cases())->map(fn(PaymentType $case) => [
            'value' => $case->value,
            'label' => $case->label()
        ]);
    }
}
