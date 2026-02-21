<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $desc
 * @property int $category_id
 * @property int $price
 */
class Product extends Model
{
    use HasUuids;
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
        )->withPivot('value');
    }

    public function fieldValues(): array
    {
        if (! $this->relationLoaded('fields')) {
            $this->load('fields');
        }

        $result = [];

        foreach ($this->fields as $field) {
            $slug = (string) $field->slug;
            $value = (string) $field->pivot->value;

            $result[$slug] = $value;
        }

        return $result;
    }
}
