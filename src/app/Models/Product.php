<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $name
 * @property string $desc
 * @property int $category_id
 * @property int $price
 */
class Product extends Model
{
    protected $fillable = [
        'name',
        'desc',
        'category_id',
        'price',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function fields(): BelongsToMany
    {
        return $this->belongsToMany(
            ProductField::class,
            'product_product_fields',
            'product_id',
            'field_id',
        );
    }
}
