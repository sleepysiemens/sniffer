<?php

namespace App\Services;

use App\Http\Resources\OrderResource;
use App\Interfaces\OrderServiceInterface;
use App\Models\Order;
use DomainException;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Throwable;

class OrderService implements OrderServiceInterface
{
    public const ON_PAGE_COUNT = 15;

    public const SELECT = [
        'id',
        'user_id',
        'status',
        'delivery_type',
        'payment_type',
        'is_payed',
        'delivered_at',
        'created_at',
    ];

    public function getAll(): LengthAwarePaginator
    {
        return Order::query()
            ->select(self::SELECT)->paginate(self::ON_PAGE_COUNT);
    }

    public function getByUserId(int $userId): LengthAwarePaginator
    {
        return Order::query()
            ->select(self::SELECT)
            ->where('user_id', $userId)
            ->orderByDesc('created_at')
            ->with([
                'items' => fn (Builder|HasMany $q) => $q->orderBy('created_at'),
                'items.product',
            ])
            ->paginate(self::ON_PAGE_COUNT);
    }

    public function getById(string $id): Order
    {
        return Order::query()
            ->select(self::SELECT)
            ->with([
                'items' => fn (Builder|HasMany $q) => $q->orderBy('created_at'),
                'items.product',
            ])
            ->findOrFail($id);
    }

    /**
     * @throws DomainException|Throwable
     */
    public function createOrder(array $data): Order
    {
        $items = Arr::get($data, 'items');

        throw_if(! $items, new DomainException('Order must have at least 1 item.'));

        Arr::forget($data, 'items');
        $order = Order::query()->create($data);

        $order->items()->createMany($items);

        return $order;
    }

    public function updateOrder(string $id, array $data): Order
    {
        $order = $this->getById($id);
        $order->update($data);

        return $order;
    }
}
