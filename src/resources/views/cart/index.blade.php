@extends('layouts.app')

@section('content')
    <section class="padding-medium">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="card border">
                        <div class="card-body">
                            <x-cart-list/>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="card border">
                        <div class="card-body">
                            <h4 class="d-flex justify-content-between align-items-center py-3 mb-4 border-bottom">
                                {{ __('Delivery info') }}
                            </h4>

                            <div x-data="deliveryInfo">
                                <div x-show="loading">
                                    <x-preloader/>
                                </div>

                                <form x-show="! loading" method="POST" action="{{ route('order.store') }}">
                                    @csrf
                                    <div class="mb-3 pb-3 border-bottom">
                                        <h5>{{ __('Delivery type') }}</h5>
                                        <template x-for="(delivery, index) in delivery_types" :key="delivery.value">
                                            <div class="flex items-center gap-2">
                                                <input type="radio"
                                                       name="delivery_type"
                                                       :id="'delivery_type_' + delivery.value"
                                                       :value="delivery.value"
                                                       x-model="selected_delivery"
                                                       :checked="index === 0">

                                                <label :for="'delivery_type_' + delivery.value"
                                                       x-text="delivery.label"
                                                       class="cursor-pointer"></label>
                                            </div>
                                        </template>

                                        <div class="mt-3" x-show="selected_delivery !== 'pickup'">
                                            <x-text-input id="delivery_info"
                                                          class="block mt-1 w-full"
                                                          type="text"
                                                          name="delivery_info"
                                                          :placeholder="__('Address')"/>
                                            <x-input-error :messages="$errors->get('delivery_info')" class="mt-2" />
                                        </div>
                                    </div>


                                    <div class="mb-3 pb-3">
                                        <h5>{{ __('Payment method') }}</h5>
                                        <template x-for="(payment, index) in payment_methods" :key="payment.value">
                                            <div class="flex items-center gap-2">
                                                <input type="radio"
                                                       name="payment_method"
                                                       :id="'payment_type_' + payment.value"
                                                       :value="payment.value"
                                                       x-model="selected_payment"
                                                       :checked="index === 0">

                                                <label :for="'payment_type_' + payment.value"
                                                       x-text="payment.label"
                                                       class="cursor-pointer"></label>
                                            </div>
                                        </template>
                                    </div>

                                    <x-primary-button class="w-100" type="submit">
                                        {{ __('Submit order') }}
                                    </x-primary-button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
