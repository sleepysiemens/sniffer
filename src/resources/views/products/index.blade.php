@extends('layouts.app')

@section('content')
    <section class="product-store pt-5" x-data="productList()" x-init="init()">
        <div x-show="loading">
            <x-preloader/>
        </div>

        <div class="container" x-show="! loading">
            <h2 class="display-5 fw-light text-uppercase text-center mb-5">{{ __('Shop') }}</h2>
            <div class="row">
                <template x-for="product in products" :key="product.id">
                    <div class="col-md-6 col-lg-3 my-4">
                        <x-product-item/>
                    </div>
                </template>
            </div>
            <x-pagination-links/>
        </div>

    </section>
@endsection
