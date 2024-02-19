@extends('layouts.app_layout')
@section('middle-section')
    {{-- <h1 class="text-5xl text-gray-700 font-bold">Create Products ${{ $product->id }}</h1>
    <p>name: {{ $product->name }}</p>
    <p>name: {{ $product->description }}</p>
    <img src="/products/{{ $product->image }}" alt=""> --}}
    <div class="w-full">
        <div class="grid grid-cols-2 w-5/6 xl:w-4/6 mx-auto gap-10 justify-center mt-20 items-start bg-white"
            style="height:600px;">
            <div class="flex items-center text-center lg:text-left px-8 md:px-12">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-800 md:text-3xl">Details Of #{{ $product->id }}</h1>
                    <h2 class="text-3xl font-semibold text-gray-800 md:text-4xl">{{ $product->name }}</h2>
                    <p class="mt-2 text-sm text-gray-500 md:text-base">{{ $product->description }}</p>
                    <p class="mt-2 text-2xl text-green-800 font-bold">{{ $product->price }}৳</p>
                    <div class="flex justify-center lg:justify-start mt-6">
                        <a class="px-4 py-3 bg-green-500 text-gray-200 text-xs font-semibold rounded hover:bg-gray-800"
                            href="{{ route('products.display') }}">Back To Products</a>

                    </div>
                </div>
            </div>
            <div class="">
                <img class="rounded-xl" src="/products/{{ $product->image }}" alt="">
            </div>
        </div>
    </div>
@endsection
