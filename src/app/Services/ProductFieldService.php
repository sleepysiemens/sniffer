<?php

namespace App\Services;

use App\Models\ProductField;

class ProductFieldService
{
    public function getIdsBySlug(array $slugs): array
    {
        return ProductField::query()
            ->whereIn('slug', $slugs)
            ->select(['slug', 'id'])
            ->get()->pluck('id', 'slug')
            ->toArray();
    }
}
