<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use App\Observers\CategoryObserver;
use App\Observers\ProductObserver;
use App\Services\APICRUDService;
use App\Services\CategoryService;
use App\Services\ProductFieldService;
use App\Services\ProductService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(ProductService::class);
        $this->app->bind(ProductFieldService::class);
        $this->app->bind(CategoryService::class);
        $this->app->bind(APICRUDService::class);

        Category::observe(CategoryObserver::class);
        Product::observe(ProductObserver::class);
    }
}
