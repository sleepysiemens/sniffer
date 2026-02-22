<?php

namespace App\Http\Requests\Category;

use App\Rules\SlugRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'         => ['string', 'max:255'],
            'slug'         => [new SlugRule()],
            'cover'        => ['string'],
            'is_available' => ['bool'],
        ];
    }
}
