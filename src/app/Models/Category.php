<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $cover
 * @property bool $is_available
 */
class Category extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'cover',
        'is_available',
    ];

    protected $casts = [
        'is_available' => 'bool',
    ];

    #[Scope]
    public function onlyAvailable(Builder $query): void
    {
        $query->where('is_available', 'true');
    }

    public function fields(): BelongsToMany
    {
        return $this->belongsToMany(
            ProductField::class,
            'category_product_fields',
            'category_id',
            'field_id',
        );
    }
}
