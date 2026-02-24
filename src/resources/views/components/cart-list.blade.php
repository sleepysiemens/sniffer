<div x-data="cartList">
    <template x-if="loading">
        <p class="text-center py-3">{{ __('Loading...') }}</p>
    </template>

    <div class="order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-4">
            <span class="text-primary">{{ __('Your cart') }}</span>
            <span class="badge bg-primary rounded-circle pt-2" x-text="total_quantity"></span>
        </h4>

        <ul class="list-group mb-4">
            <template x-for="item in items" :key="item.product_id">
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0" x-text="item.name"></h6>
                        {{--<small class="text-body-secondary" x-text="item.desc"></small>--}}
                    </div>
                    <span class="text-body-secondary" x-text="item.price + ' ₽'"></span>
                </li>
            </template>

            <template x-if="!loading && items.length === 0">
                <li class="list-group-item text-center">Корзина пуста</li>
            </template>

            <li class="list-group-item d-flex justify-content-between">
                <span class="fw-bold">{{ __('Total') }}</span>
                <strong x-text="total_price + ' ₽'"></strong>
            </li>
        </ul>

        <x-primary-button class="w-100" type="button">Continue to checkout</x-primary-button>
    </div>
</div>
