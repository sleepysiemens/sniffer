@props(['withButton' => false])
<div x-data="cartList">

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

                    <div>
                        <a href="" @click.prevent="cartItemDecrement(item.product_id)">
                            <i class="fa-solid fa-minus"></i>
                        </a>
                        <a href="" @click.prevent="cartItemIncrement(item.product_id)">
                            <i class="fa-solid fa-plus"></i>
                        </a>
                    </div>

                    <span class="text-body-secondary" x-text="item.quantity + ' x ' + item.price + ' ₽'"></span>

                </li>
            </template>

            <template x-if="!loading && items.length === 0">
                <li class="list-group-item text-center">{{ __('Cart is empty.') }}</li>
            </template>

            <li class="list-group-item d-flex justify-content-between">
                <span class="fw-bold">{{ __('Total') }}</span>
                <strong x-text="total_price + ' ₽'"></strong>
            </li>
        </ul>

        <div class="my-4">
            <a class="text-danger" href="" @click.prevent="clear">
                <i class="fa-regular fa-trash-can"></i> {{ __('Empty cart') }}
            </a>
        </div>

        @if($withButton)
            <a href="{{ route('cart.index') }}" class="btn btn-dark w-100">
                {{ __('Continue to checkout') }}
            </a>
        @else
            <span x-init="fetchCart"></span>
        @endif
    </div>
</div>
