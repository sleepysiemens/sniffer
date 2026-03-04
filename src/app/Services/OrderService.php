<?php

namespace App\Services;

use App\Interfaces\OrderServiceInterface;
use App\Models\Order;
use App\Services\Cart\CartService;
use DomainException;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Throwable;

class OrderService implements OrderServiceInterface
{
    public const ON_PAGE_COUNT = 5;

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

    public function __construct(
        protected CartService $cartService,
        protected ProductService $productService,
    ) {}

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
            ->paginate(self::ON_PAGE_COUNT);
    }

    public function getById(string $id): Order
    {
        return Order::query()
            ->select(self::SELECT)
            ->findOrFail($id);
    }

    /**
     * @throws DomainException|Throwable
     */
    public function createOrder(array $data): Order
    {
        return DB::transaction(function () use ($data) {
            $cart = $this->cartService->getCart();
            $cartItems = $cart->items;
            $data['user_id'] = auth()->user()->id;

            throw_if(empty($cartItems), new DomainException('Order must have at least 1 item.'));

            $order = Order::query()->create($data);
            $items = [];

            foreach ($cartItems as $item) {
                $items[] = [
                    'order_id'       => $order->id,
                    'product_id'     => $item->product_id,
                    'quantity'       => $item->quantity,
                    'price_snapshot' => $item->price_snapshot,
                ];

                $this->productService->decrementAmount($item->product_id, $item->quantity);
            }

            $order->items()->insert($items);
            $this->cartService->clearCart();

            return $order;
        });
    }

    public function updateOrder(string $id, array $data): Order
    {
        $order = $this->getById($id);
        $order->update($data);

        return $order;
    }
}
