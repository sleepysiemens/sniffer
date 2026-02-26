@extends('layouts.app')

@section('content')
    <section class="padding-medium" x-data="productDetails('{{ $id }}')" x-init="init()">\
        <div x-show="loading">
            <x-preloader/>
        </div>

        <div class="container" x-show="! loading">
            <div class="row">
                <div class="col col-12 col-lg-4">
                    <div class="image-holder" style="width: 100%; height: 100%;">
                        <img src="{{ asset('images/item1.jpg') }}" alt="Books" class="product-image img-fluid">
                    </div>
                </div>

                <div class="col col-12 col-lg-8">
                    <h1 x-text="product.name"></h1>

                    <div class="d-flex">
                        <h3 class="fw-normal text-muted my-auto" x-text="product.price + ' ₽'"></h3>

                        {{-- Cart --}}
                        <button type="button"
                                @click.prevent="cartItemIncrement(product.id)"
                                x-show="quantity < 1"
                                class="btn btn-primary ms-5">
                            <i class="fa-solid fa-cart-shopping"></i>
                            {{ __('Add to cart') }}
                        </button>

                        <div class="ms-5 border p-3 border-dark rounded" x-show="quantity > 0">
                            <span class="me-2">
                                <i class="fa-solid fa-cart-shopping"></i>
                                {{ __('In cart') }}
                            </span>
                            <a href="" @click.prevent="cartItemDecrement(product.id)">
                                <i class="fa-solid fa-minus"></i>
                            </a>
                            <span class="px-2" x-text="quantity"></span>
                            <a href="" @click.prevent="cartItemIncrement(product.id)">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                        </div>
                    </div>

                    <p class="mt-4" x-text="product.desc"></p>
                </div>
            </div>
        </div>
    </section>
@endsection
