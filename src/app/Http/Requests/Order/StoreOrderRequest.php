<?php

namespace App\Http\Requests\Order;

use App\Enums\DeliveryType;
use App\Enums\PaymentMethod;
use App\Http\Requests\AbstractApiFormRequest;
use App\Models\Order;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

/** @mixin Order */
class StoreOrderRequest extends AbstractApiFormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'delivery_type'  => ['string', new Enum(DeliveryType::class)],
            'delivery_info'  => [Rule::requiredIf(fn() => $this->delivery_type !== 'pickup')],
            'payment_method' => ['string', new Enum(PaymentMethod::class)],
            'is_payed'       => ['boolean'],
        ];
    }
}
