<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Collection;

/**
 * @property string $id
 * @property int $user_id
 * @property string $status
 * @property string $delivery_type
 * @property string $delivery_info
 * @property string $payment_type
 * @property bool $is_payed
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $delivered_at
 * @property Collection $items
 */
class Order extends Model
{
    protected $with = ['items.product'];

    protected $fillable = [
        'user_id',
        'status',
        'delivery_type',
        'delivery_info',
        'payment_type',
        'is_payed',
        'delivered_at',
    ];

    protected $casts = [
        'is_payed' => 'boolean',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function products(): HasManyThrough
    {
        return $this->hasManyThrough(
            Product::class,
            OrderItem::class,
            'order_id',
            'id',
            'id',
            'product_id'
        );
    }
}
