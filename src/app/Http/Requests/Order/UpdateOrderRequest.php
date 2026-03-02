<?php

namespace App\Http\Requests\Order;

use App\Enums\DeliveryType;
use App\Enums\OrderStatus;
use App\Enums\PaymentMethod;
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
            'delivery_type' => [new Enum(DeliveryType::class)],
            'delivery_info' => ['string'],
            'payment_method'  => ['string', new Enum(PaymentMethod::class)],
            'is_payed'      => ['boolean'],
        ];
    }
}
