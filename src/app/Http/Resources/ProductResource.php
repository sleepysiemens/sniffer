<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Product
 */
class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'name'        => $this->name,
            'desc'        => $this->desc,
            'category_id' => $this->category_id,
            'price'       => $this->category_id,
            'fields'      => $this->fieldValues()
        ];
    }
}
