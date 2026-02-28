<?php

namespace App\Listeners;

use App\Services\Cart\CartService;
use Illuminate\Auth\Events\Login;

class MergeSessionCart
{
    public function __construct(
        protected CartService $cartService
    ) {}

    public function handle(Login $event): void
    {
        $this->cartService->mergeSessionWithDatabase();
    }
}
