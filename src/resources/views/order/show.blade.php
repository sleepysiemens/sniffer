@extends('layouts.app')

@section('content')
    <section class="padding-medium" x-data="orderDetails('{{ $id }}')">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5 x-text="'{{ __('Order') }} ' + order.id"></h5>
                    <div class="d-flex justify-content-between">
                        <span class="text-body-secondary" x-text="order.created_at"></span>
                        <span class="text-body-secondary" x-text="order.status"></span>
                    </div>
                    <div class="card border">
                        <div class="card-body">
                            <div class="row">
                                <template x-for="item in order.items">
                                    <div class="row">
                                        <div class="col-1">
                                            <img src="{{ asset('images/item1.jpg') }}" alt="Books" class="product-image img-fluid">
                                        </div>
                                        <div class="col-11">
                                            <h6 x-text="item.product.name"></h6>
                                            {{-- todo fields --}}
                                            <h6 x-text="item.price_snapshot + ' ₽'"></h6>
                                        </div>
                                    </div>
                                </template>
                            </div>

                            <div class="row">
                                <div class="col-12 border-bottom border-top py-3 mt-4">
                                    <div class="d-flex justify-content-between">
                                        <span>{{ __('Delivery type') }}</span>
                                        <span x-text="order.delivery_type"></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>{{ __('Address') }}</span>
                                        <span x-text="order.delivery_info"></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>{{ __('Payment method') }}</span>
                                        <span x-text="order.payment_method"></span>
                                    </div>
                                </div>
                                <div class="col-12 pt-4">
                                    <div class="d-flex justify-content-between">
                                        <h6>{{ __('Total') }}</h6>
                                        <h6 x-text="order.total_price + ' ₽'"></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
