<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\AbstractApiFormRequest;

class UpdateProductRequest extends AbstractApiFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'         => ['string', 'max:255'],
            'desc'         => ['string'],
            'category'     => ['string', 'max:255'],
            'price'        => ['int'],
            'fields'       => ['nullable', 'array'],
            'fields.*'     => ['string'],
        ];
    }
}
