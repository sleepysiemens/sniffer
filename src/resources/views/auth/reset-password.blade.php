@extends('layouts.app')

@section('content')
    <section style="background-image:url({{ asset('images/banner-img1.jpg') }});">
        <div class="container vh-100 d-flex">
            <div class="card m-auto border shadow w-50 bg-white">
                <div class="card-body">
                    <h3 class="text-center my-3">
                        {{ __('Reset password') }}
                    </h3>

                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <!-- Email Address -->
                        <div>
                            <x-text-input id="email"
                                          :placeholder="__('Email')"
                                          class="block mt-1 w-full"
                                          type="email"
                                          name="email"
                                          :value="old('email', $request->email)"
                                          required
                                          autofocus
                                          autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-text-input id="password"
                                          :placeholder="__('Password')"
                                          class="block mt-1 w-full"
                                          type="password"
                                          name="password"
                                          required
                                          autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-text-input id="password_confirmation"
                                          :placeholder="__('Confirm Password')"
                                          class="block mt-1 w-full"
                                          type="password"
                                          name="password_confirmation"
                                          required
                                          autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>


                        <div class="input-group mt-5">
                            <x-primary-button class="w-100" type="submit">
                                {{ __('Reset Password') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
