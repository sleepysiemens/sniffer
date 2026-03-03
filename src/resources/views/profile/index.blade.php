@props(['tabs' => [
    'orders' => [
            'icon_class' => 'fa-solid fa-box-open',
            'name' => __('Orders'),
        ],
    'personal_info' => [
            'icon_class' => 'fa-solid fa-user',
            'name' => __('Personal info'),
        ],
    ]
])

@extends('layouts.app')

@section('content')
    <section class="padding-medium">
        <div class="container vh-100">
            <div class="row" x-data="{ selected_tab: '{{ array_key_first($tabs) }}' }">
                <div class="col-12 col-lg-4">
                    <div class="card border">
                        <div class="card-body">
                            <ul class="list-unstyled navbar-nav menu-list">
                                @foreach($tabs as $key => $tab)
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-3 fs-6 border-bottom"
                                           :class="{ 'active': selected_tab === '{{ $key }}' }"
                                           href=""
                                           @click.prevent="selected_tab = '{{ $key }}'">
                                            <i class="{{ $tab['icon_class'] }} me-2"></i>
                                            {{ $tab['name'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    @foreach(array_keys($tabs) as $key)
                        <div x-show="selected_tab === '{{ $key }}'">
                            @include("profile.tabs.$key")
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
