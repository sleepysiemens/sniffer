<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
