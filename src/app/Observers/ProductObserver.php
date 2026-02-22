<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class ProductObserver
{
    public function created(): void
    {
        $this->flushList();
    }

    public function updated(Product $product): void
    {
        $this->flushList();
        $this->flushSingle($product->id);
    }

    public function deleted(Product $product): void
    {
        $this->flushList();
        $this->flushSingle($product->id);
    }
    private function flushList(): void
    {
        Cache::tags(['products_list'])->flush();
    }

    private function flushSingle(string $id): void
    {
        Cache::tags(['product:' . $id])->flush();
    }
}
