@extends('layouts.admin_dashboard_layout')


@section('content-section')
    <div class="flex justify-between items-center my-10">
        <h1 class="text-5xl text-gray-700 font-bold">product's Lists</h1>
        <a class="bg-green-500 px-4 py-1 rounded-lg my-2 text-white" href="{{ route('admin.dashboard.products.create') }}">
            Create New Product
        </a>
    </div>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">product Id</th>
                    <th scope="col" class="px-6 py-3">Product Name</th>
                    <th scope="col" class="px-6 py-3">Description</th>
                    <th scope="col" class="px-6 py-3">Image</th>
                    <th scope="col" class="px-6 py-3">Details</th>
                    <th scope="col" class="px-6 py-3">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $product)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $product->id }}
                        </th>
                        <td class="px-6 py-4">{{ $product->name }}</td>
                        <td class="px-6 py-4">{{ $product->description }}</td>
                        <td class="px-6 py-4">
                            <img src="/products/{{ $product->image }}" class="w-14 h-14 rounded-lg border-2" alt="">
                        </td>
                        <td class="px-6 py-4">
                            <a class="bg-green-500 px-4 py-1 rounded-lg my-2 text-white"
                                href="{{ route('admin.dashboard.products.details', $product->id) }}">
                                Details
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            <a class="bg-pink-500 px-4 py-1 rounded-lg my-2 text-white"
                                href="{{ route('admin.dashboard.products.edit', $product->id) }}">
                                Edit
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            <form method="POST" action="/admin/dashboard/products/{{ $product->id }}/delete">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-5 py-2 bg-red-500 text-white rounded-lg">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-10 my-10">
            {{ $data->links('') }}
        </div>
    </div>
@endsection
