<?php

namespace App\Http\Controllers\AJAX;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Http\Requests\Order\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Services\APICRUDService;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OrderController extends Controller
{
    public function __construct(
        protected  APICRUDService $apiCrudService,
        protected OrderService $orderService
    ) {}

    public function getAll(): JsonResponse|AnonymousResourceCollection
    {
        return $this->apiCrudService->handleAction(function () {
            $orders = $this->orderService->getAll();

            return OrderResource::collection($orders)->additional(['failed' => false]);
        });
    }

    public function userOrders(): JsonResponse|AnonymousResourceCollection
    {
        $userId = auth()->user()->id;

        return $this->apiCrudService->handleAction(function() use ($userId) {
            $orders = $this->orderService->getByUserId($userId);

            return OrderResource::collection($orders)->additional(['failed' => false]);
        });
    }

    public function show(string $id): JsonResponse|OrderResource
    {
        return $this->apiCrudService->handleAction(function () use ($id) {
            $order = $this->orderService->getById($id);

            return (new OrderResource($order))->additional(['failed' => false]);
        });
    }

    public function createOrder(StoreOrderRequest $request): JsonResponse|OrderResource
    {
        return $this->apiCrudService->handleAction(function () use ($request) {
            $order = $this->orderService->createOrder($request->validated());

            return (new OrderResource($order))->additional(['failed' => false]);
        });
    }

    public function update(string $id, UpdateOrderRequest $request): JsonResponse|OrderResource
    {
        return $this->apiCrudService->handleAction(function () use ($id, $request) {
            $order = $this->orderService->updateOrder($id, $request->validated());

            return (new OrderResource($order))->additional(['failed' => false]);
        });
    }
}
