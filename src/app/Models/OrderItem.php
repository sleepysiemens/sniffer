<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $order_id
 * @property string $product_id
 * @property int $quantity
 * @property int $price_snapshot
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class OrderItem extends Model
{
    protected $fillable = [
        'product_id',
        'quantity',
        'price__snapshot',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
