@extends('admin.masterDashboardLayout')


@section('content-section')
    <div class="w-full">
        <div class="flex  gap-10 justify-center items-center bg-white" style="height:600px;">
            <div class="flex items-center text-center lg:text-left px-8 md:px-12 lg:w-1/2">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-800 md:text-3xl">Details Of #{{ $product->id }}</h1>
                    <h2 class="text-3xl font-semibold text-gray-800 md:text-4xl">{{ $product->name }}</h2>
                    <p class="mt-2 text-sm text-gray-500 md:text-base">{{ $product->description }}</p>
                    <p class="mt-2 text-2xl text-gray-800 font-bold">{{ $product->price }}৳</p>
                    <div class="flex justify-center lg:justify-start mt-6">
                        <a class="px-4 py-3 bg-green-500 text-gray-200 text-xs font-semibold rounded hover:bg-gray-800"
                            href="{{route("admin.dashboard.allProducts")}}">Back To Products</a>
                       
                    </div>
                </div>
            </div>
            <div class="hidden lg:block lg:w-1/2" style="clip-path:polygon(10% 0, 100% 0%, 100% 100%, 0 100%)">
                <div class="h-full object-cover border">
                    <img src="/products/{{ $product->image }}" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
