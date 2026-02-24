<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $product_id
 * @property int $price_snapshot
 * @property int $quantity
 * @property Product $product
 */
class CartItem extends Model
{
    protected $fillable = [
        'product_id',
        'quantity',
        'price_snapshot',
    ];

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
