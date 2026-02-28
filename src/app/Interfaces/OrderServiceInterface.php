<?php

namespace App\Interfaces;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Pagination\LengthAwarePaginator;

interface OrderServiceInterface
{
    public function getAll(): LengthAwarePaginator;

    public function getByUserId(int $userId): LengthAwarePaginator;

    public function getById(string $id): Order;

    public function createOrder(array $data): Order;

    public function updateOrder(string $id, array $data): Order;
}
