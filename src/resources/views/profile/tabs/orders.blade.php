<div class="px-3" x-data="orderList">
    <h4 class="d-flex justify-content-between align-items-center py-3">
        {{ __('Orders') }}
    </h4>

    <div x-show="loading">
        <x-preloader/>
    </div>

    <div x-show="! loading">
        <div class="row">
            <template x-for="order in orders" :key="order.id">
                <div class="col-12 mb-2">
                    <a class="card border" :href="`{{ route('order.show', ':id') }}`.replace(':id', order.id)">
                        <div class="card-body">
                            <div class="d-flex justify-content-between w-100">
                                <small class="text-body-secondary" x-text="'from ' + order.created_at"></small>
                                <small class="text-body-secondary" x-text="order.status"></small>
                            </div>
                            <h5 class="my-3" x-text="order.id"></h5>
                            <div class="d-flex justify-content-between">
                                <span x-text="order.delivery_type"></span>

                                <div>
                                    <p class="m-0">{{ __('Payment method') }}:</p>
                                    <p class="m-0" x-text="order.payment_method"></p>
                                </div>

                                <div>
                                    <p class="m-0" x-text="order.total_quantity + ' {{ __('products') }}'"></p>
                                    <h5 class="m-0" x-text="order.total_price + ' ₽'"></h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </template>
        </div>

        <x-pagination-links/>
    </div>
</div>
