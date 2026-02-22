<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $slug
 * @property string $name
 * @property string $type
 */
class ProductField extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'slug',
        'name',
        'type',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(
            Category::class,
            'category_product_fields',
            'field_id',
            'category_id',
        );
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(
            Product::class,
            'product_product_fields',
            'field_id',
            'product_id',
        );
    }
}
