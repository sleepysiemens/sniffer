<?php

namespace App\Http\Requests\Order;

use App\Http\Requests\AbstractApiFormRequest;
use App\Models\Order;
use Illuminate\Validation\Rule;

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
            'status'        => ['string', Rule::in(Order::STATUSES)],
            'delivery_type' => ['string', Rule::in(Order::DELIVERY_TYPES)],
            'delivery_info' => ['required', 'string'],
            'payment_type'  => ['string', Rule::in(Order::PAYMENT_TYPES)],
            'is_payed'      => ['boolean'],
            'items'         => ['array'],
        ];
    }
}
