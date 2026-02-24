@extends('layouts.app')

@section('content')
    <section style="background-image:url({{ asset('images/banner-img1.jpg') }});">
        <div class="container vh-100 d-flex">
            <div class="card m-auto border shadow w-50 bg-white">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        <h3 class="text-center my-3">
                            {{ __('Login') }}
                        </h3>
                        @csrf

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-text-input id="email"
                                          class="block mt-1 w-full text-lowercase"
                                          type="email" name="email"
                                          :value="old('email')"
                                          :placeholder="__('Email')"
                                          required
                                          autofocus
                                          autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-text-input id="password" class="block mt-1 w-full text-lowercase"
                                          type="password"
                                          name="password"
                                          :placeholder="__('Password')"
                                          required
                                          autocomplete="current-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="input-group mt-5">
                            <x-primary-button class="w-100" type="submit">
                                {{ __('Log in') }}
                            </x-primary-button>
                        </div>

                        <div class="d-flex justify-content-center">
                            <div class="text-center mt-4 mx-2">
                                <a class="text-center underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none"
                                   href="{{ route('register') }}">
                                    {{ __('Register') }}
                                </a>
                            </div>
                            @if (Route::has('password.request'))
                                <div class="text-center mt-4 mx-2">
                                    <a class="text-center underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none"
                                       href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
