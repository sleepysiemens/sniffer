<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\AbstractApiFormRequest;

class StoreProductRequest extends AbstractApiFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'         => ['string', 'required', 'max:255'],
            'desc'         => ['string'],
            'category'     => ['string', 'required', 'max:255'],
            'price'        => ['int', 'required'],
            'fields'       => ['nullable', 'array'],
            'fields.*'     => ['string'],
        ];
    }
}
