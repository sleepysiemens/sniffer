<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class CategoryObserver
{
    public function created(): void
    {
        $this->flushList();
    }

    public function updated(Category $category): void
    {
        $this->flushList();
        $this->flushSingle($category->id);
    }

    public function deleted(Category $category): void
    {
        $this->flushList();
        $this->flushSingle($category->id);
    }

    private function flushList(): void
    {
        Cache::tags(['categories_list'])->flush();
    }

    private function flushSingle(int $id): void
    {
        Cache::tags(['category:' . $id])->flush();
    }
}
