@extends('layouts.app')

@section('content')
    <section>
        <div class="container vh-100 d-flex">
            <div class="my-auto">
                <x-slot name="header">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Dashboard') }}
                    </h2>
                </x-slot>

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                {{ __("You're logged in!") }}
                            </div>
                        </div>
                    </div>
                </div>
                <form method="post" action="{{ route('logout') }}">
                    @csrf
                    <button>logout</button>
                </form>
            </div>
        </div>
    </section>
@endsection
