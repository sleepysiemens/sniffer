<?php

namespace App\Http\Requests\Order;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'status'        => ['string', Rule::in(Order::STATUSES)],
            'delivery_type' => ['string', Rule::in(Order::DELIVERY_TYPES)],
            'delivery_info' => ['string'],
            'payment_type'  => ['string', Rule::in(Order::PAYMENT_TYPES)],
            'is_payed'      => ['boolean'],
        ];
    }
}
