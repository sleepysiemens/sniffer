<?php

namespace App\Services\Cart;

use App\Services\ProductService;

abstract class AbstractCartService
{
    protected const SESSION_KEY = 'guest_cart';

    public function __construct(protected ProductService $productService) {}
}
