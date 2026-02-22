@extends('layouts.app')

@section('content')
    <section style="background-image:url({{ asset('images/banner-img1.jpg') }});">
        <div class="container vh-100 d-flex">
            <div class="card m-auto border shadow w-50 bg-white">
                <div class="card-body">
                    <h3 class="text-center my-3">
                        {{ __('Forgot your password?') }}
                    </h3>

                    <div class="mt-4 text-sm text-gray-600">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </div>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-text-input id="email"
                                          :placeholder="__('Email')"
                                          class="block mt-1 w-full"
                                          type="email"
                                          name="email"
                                          :value="old('email')"
                                          required
                                          autofocus />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="input-group my-3">
                            <x-primary-button class="w-100" type="submit">
                                {{ __('Email Password Reset Link') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
