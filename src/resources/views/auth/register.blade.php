@extends('layouts.app')

@section('content')
    <section>
        <div class="container vh-100 d-flex">
            <div class="card m-auto border shadow w-50 bg-white">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        <h3 class="text-center my-3">
                            {{ __('Register') }}
                        </h3>
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-text-input id="name"
                                          :placeholder="__('Name')"
                                          class="block mt-1 w-full "
                                          type="text" name="name"
                                          :value="old('name')"
                                          required
                                          autofocus
                                          autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-text-input id="email"
                                          :placeholder="__('Email')"
                                          class="block mt-1 w-full text-lowercase"
                                          type="email"
                                          name="email"
                                          :value="old('email')"
                                          required
                                          autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-text-input id="password" class="block mt-1 w-full text-lowercase"
                                          :placeholder="__('Password')"
                                          type="password"
                                          name="password"
                                          required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-text-input id="password_confirmation" class="block mt-1 w-full text-lowercase"
                                          :placeholder="__('Confirm password')"
                                          type="password"
                                          name="password_confirmation" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="input-group mt-5">
                            <x-primary-button class="w-100" type="submit">
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>

                        <div class="text-center mt-4 mx-2">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
