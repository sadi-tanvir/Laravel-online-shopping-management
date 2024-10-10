@extends('layouts.admin_dashboard_layout')


@section('content-section')
    <div class="flex flex-col justify-center items-center my-5">
        <div class="w-4/6">
            <h1 class="text-4xl text-gray-700 font-bold mb-5">Create New Product</h1>
            <form method="POST" action="/admin/dashboard/products/store" enctype="multipart/form-data" class="mx-auto">
                @csrf
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                        Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="product name">
                    @if ($errors->has('name'))
                        <span class="text-red-500">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-5">
                    <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea id="description" name="description" rows="10" value="{{ old('description') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="type your description">{{ old('description') }}</textarea>
                    @if ($errors->has('description'))
                        <span class="text-red-500">{{ $errors->first('description') }}</span>
                    @endif
                </div>

                <div class="mb-5">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                        Price</label>
                    <input type="number" id="price" name="price" value="{{ old('price') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="product price">
                    @if ($errors->has('price'))
                        <span class="text-red-500">{{ $errors->first('price') }}</span>
                    @endif
                </div>

                <div class="mb-5">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                        image</label>
                    <input type="file" id="image" name="image" value="{{ old('image') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="name@flowbite.com">
                    @if ($errors->has('image'))
                        <span class="text-red-500">{{ $errors->first('image') }}</span>
                    @endif
                </div>
                <button id="add_product" type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
        </div>
    </div>
@endsection

@include('components.Ajax_js')
<script>
    $(document).ready(function(){
        $(document).on('click', function(e){
            e.preventDefault();
            let name = $("#name").val();
            let description = $("#description").val();
            let price = $("#price").val();

            console.log(name);
            console.log(description);
            console.log(price);
        })
    })

   /*  document.addEventListener('DOMContentLoaded', function() {
        document.addEventListener('click', function(e) {
            e.preventDefault();
            let name = document.getElementById("name").value;
            let description = document.getElementById("description").value;
            let price = document.getElementById("price").value;

            console.log(name);
            console.log(description);
            console.log(price);
        });
    }); */
</script>
