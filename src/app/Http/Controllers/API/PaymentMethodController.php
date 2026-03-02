<?php

namespace App\Http\Controllers\API;

use App\Enums\PaymentMethod;
use Illuminate\Support\Collection;

class PaymentMethodController extends AbstractDeliveryInfoController
{
    public function getData(): Collection
    {
        return collect(PaymentMethod::cases())->map(fn(PaymentMethod $case) => [
            'value' => $case->value,
            'label' => $case->label()
        ]);
    }
}
