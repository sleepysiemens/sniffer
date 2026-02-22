<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $name
 * @property string $desc
 * @property int $category_id
 * @property int $price
 * @property int $stock_amount
 */
class Product extends Model
{
    use HasUuids;
    protected $fillable = [
        'name',
        'desc',
        'category_id',
        'price',
        'stock_amount',
    ];

    #[Scope]
    public function onlyAvailable(Builder $query): void
    {
        $query->where('stock_amount', '>', '0')
            ->whereHas('category', fn (Builder $query) => $query->where('is_available', 'true'));
    }

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
