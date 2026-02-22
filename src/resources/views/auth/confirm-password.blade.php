@extends('layouts.app')

@section('content')
    <section style="background-image:url({{ asset('images/banner-img1.jpg') }});">
        <div class="container vh-100 d-flex">
            <div class="card m-auto border shadow w-50 bg-white">
                <div class="card-body">
                    <h3 class="text-center my-3">
                        {{ __('Forgot your password?') }}
                    </h3>

                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                    </div>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <!-- Password -->
                        <div>
                            <x-text-input id="password" class="block mt-1 w-full"
                                          :placeholder="__('Password')"
                                          type="password"
                                          name="password"
                                          required autocomplete="current-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="input-group mt-5">
                            <x-primary-button class="w-100" type="submit">
                                {{ __('Confirm') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
