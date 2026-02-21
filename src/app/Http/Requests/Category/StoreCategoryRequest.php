<?php

namespace App\Http\Requests\Category;

use App\Http\Requests\AbstractApiFormRequest;
use App\Rules\SlugRule;

class StoreCategoryRequest extends AbstractApiFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'         => ['string', 'required', 'max:255'],
            'slug'         => ['required', new SlugRule()],
            'cover'        => ['string'],
            'is_available' => ['bool'],
        ];
    }
}
