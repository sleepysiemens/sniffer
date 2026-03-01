<?php

namespace App\Http\Requests\Order;

use App\Enums\DeliveryType;
use App\Enums\OrderStatus;
use App\Enums\PaymentType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id'       => ['int', 'exists:user,id'],
            'status'        => ['string', new Enum(OrderStatus::class)],
            'delivery_type' => ['string', new Enum(DeliveryType::class)],
            'delivery_info' => ['string'],
            'payment_type'  => ['string', new Enum(PaymentType::class)],
            'is_payed'      => ['boolean'],
        ];
    }
}
