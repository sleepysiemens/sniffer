<?php

namespace App\Http\Requests\Order;

use App\Enums\DeliveryType;
use App\Enums\OrderStatus;
use App\Enums\PaymentType;
use App\Http\Requests\AbstractApiFormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreOrderRequest extends AbstractApiFormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id'       => ['required', 'int', 'exists:user,id'],
            'status'        => ['string', new Enum(OrderStatus::class)],
            'delivery_type' => ['string', new Enum(DeliveryType::class)],
            'delivery_info' => ['required', 'string'],
            'payment_type'  => ['string', new Enum(PaymentType::class)],
            'is_payed'      => ['boolean'],
            'items'         => ['array'],
        ];
    }
}
