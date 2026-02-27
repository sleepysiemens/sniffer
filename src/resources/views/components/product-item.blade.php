<div class="product-item">
    {{--<div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
        New
    </div>
    <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
        Sale
    </div>--}}
    <div class="image-holder" style="width: 100%; height: 100%;">
        <img src="{{ asset('images/item1.jpg') }}" alt="Books" class="product-image img-fluid">
    </div>
    <div class="cart-concern">
        <div class="cart-button d-flex justify-content-center align-items-center">
            <a :href="`{{ route('products.show', ':id') }}`.replace(':id', product.id)" class="view-btn">
                {{ __('More info') }}
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>
    <div class="product-detail d-flex justify-content-between align-items-center mt-4">
        <h4 class="product-title mb-0">
            <a :href="`{{ route('products.show', ':id') }}`.replace(':id', product.id)" x-text="product.name"></a>
        </h4>
        <p class="m-0 fs-5 fw-normal" x-text="product.price + ' ₽'"></p>
    </div>
</div>
