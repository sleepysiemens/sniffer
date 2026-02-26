<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\APICRUDService;
use App\Services\Cart\CartService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class CartController extends Controller
{
    public function __construct(protected CartService $cartService, protected  APICRUDService $apiCrudService){}

    public function getCart(): JsonResource
    {
        return $this->apiCrudService->handleAction(fn() => $this->cartService->getCart()->additional(['failed' => false]));
    }

    public function clearCart(): JsonResponse|null
    {
        return $this->apiCrudService->handleAction(fn() => $this->cartService->clearCart());
    }
    public function incrementItem(string $productId): JsonResponse|null
    {
        return $this->apiCrudService->handleAction(fn() => $this->cartService->incrementItem($productId));
    }

    public function decrementItem(string $productId): JsonResponse|null
    {
        return $this->apiCrudService->handleAction(fn() => $this->cartService->decrementItem($productId));
    }

    public function deleteItem(string $productId): JsonResponse|null
    {
        return $this->apiCrudService->handleAction(fn() => $this->cartService->removeItem($productId));
    }
}
