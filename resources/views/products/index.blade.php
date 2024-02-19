@extends('layouts.app_layout')

@section('middle-section')
    <h1 class="text-4xl text-gray-700 font-bold uppercase text-center mt-5">products Lists</h1>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mt-10">

        @foreach ($data as $product)
            <div class=' shadow-xl rounded-xl border p-5 flex flex-col'>
                <img src="/products/{{ $product->image }}" class="max-h-[200px] w-full rounded-xl border shadow" alt='product' class='rounded-2xl' />
                <div class='space-y-1 mt-3 flex-1'>
                    <p class='text-lg sm:text-xl md:text-2xl font-bold text-green-700'>{{ $product->name }}</p>
                    <h3 class='text-md sm:text-lg md:text-xl font-semibold text-gray-700'>
                        {{ $product->description }}
                    </h3>
                </div>
                <div class="text-center w-full">
                    <span class='text-xl md:text-2xl font-bold text-primary text-center'>{{$product->price}}৳</span>
                </div>
                <div class="w-full flex justify-center items-center space-x-2 mt-4">
                    <a href="#" class="shadow flex justify-center items-center bg-gray-600 text-white font-semibold rounded-lg py-2 px-3 w-full">cart</a>
                    <a href="{{route('products.details', $product->id)}}" class="shadow flex justify-center items-center bg-green-500 text-white font-semibold rounded-lg py-2 px-3 w-full">Details</a>
                </div>
            </div>
        @endforeach

    </div>
@endsection
