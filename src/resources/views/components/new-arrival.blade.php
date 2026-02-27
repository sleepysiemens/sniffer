<section id="new-arrival" class="product-store"
         x-data="latestProducts"
         x-init="fetchProducts()">
    <div x-show="loading">
        <x-preloader/>
    </div>

    <div class="container" x-show="! loading">
        <h2 class="display-5 fw-light text-uppercase text-center mb-5">
            {{ __('New Arrivals') }}
        </h2>
        <div class="row">
            <template x-for="product in products" :key="product.id">
                <div class="col-md-6 col-lg-3 my-4">
                    <x-product-item/>
                </div>
            </template>
        </div>
        <div class="text-center mt-5 pt-4">
            <a href="{{ route('products.index') }}" class="btn btn-dark rounded-3">
                {{ __('View All Products') }}
            </a>
        </div>
    </div>
</section>
