@extends('layouts.admin_dashboard_layout')


@section('content-section')
    <div class="flex flex-col justify-center items-center my-5">
        <div class="w-4/6">
            <h1 class="text-5xl text-gray-700 font-bold mb-5">Edit Product #{{ $product->id }}</h1>
            <form method="POST" action="/admin/dashboard/products/{{ $product->id }}/update" enctype="multipart/form-data"
                class="">
                @csrf
                @method('PUT')
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                        Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                        placeholder="name@flowbite.com">
                    @if ($errors->has('name'))
                        <span class="text-red-500">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-5">
                    <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea id="description" name="description" rows="10" value="{{ old('description') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                        placeholder="type your description">{{ old('description', $product->description) }}</textarea>
                    @if ($errors->has('description'))
                        <span class="text-red-500">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="mb-5">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                        image</label>
                    <input type="file" id="image" name="image" value="{{ old('image', $product->image) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                        placeholder="name@flowbite.com">
                    @if ($errors->has('image'))
                        <span class="text-red-500">{{ $errors->first('image') }}</span>
                    @endif
                </div>
                <button type="submit"
                    class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-600 dark:focus:ring-green-800">Submit</button>
            </form>
        </div>
    </div>
@endsection
