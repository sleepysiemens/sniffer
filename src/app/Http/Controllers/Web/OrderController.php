<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Http\Requests\Order\UpdateOrderRequest;
use App\Services\OrderService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Throwable;

class OrderController extends Controller
{
    public function __construct(protected  OrderService $orderService){}

    public function store(StoreOrderRequest $request): RedirectResponse
    {
        try {
            $order = $this->orderService->createOrder($request->validated());
        } catch (Throwable $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }

        return redirect()->route('order.show', $order->id);
    }

    public function update(string $id, UpdateOrderRequest $request): RedirectResponse
    {
        try {
            $order = $this->orderService->updateOrder($id, $request->validated());
        } catch (Throwable $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }

        return redirect()->route('order.show', $order->id);
    }

    public function show(string $id): View
    {
        return view('order.show', compact('id'));
    }
}
