@extends('layouts.app_layout')


@section('middle-section')
    <div class="relative overflow-hidden min-h-[80vh]">
        <!-- Gradients -->
        <div aria-hidden="true" class="flex absolute -top-96 start-1/2 transform -translate-x-1/2">
            <div
                class="bg-gradient-to-r from-violet-300/10 to-purple-50/50 blur-3xl w-[25rem] h-[44rem] rotate-[-60deg] transform -translate-x-[10rem] dark:from-violet-900/50 dark:to-purple-900">
            </div>
            <div
                class="bg-gradient-to-tl from-green-50/50 via-green-50/50 to-green-50/50 blur-3xl w-[90rem] h-[50rem] rounded-fulls origin-top-left -rotate-12 -translate-x-[15rem] dark:from-indigo-900/70 dark:via-indigo-900/70 dark:to-green-900/70">
            </div>
        </div>

        <div class="relative z-10">
            <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-16">
                <div class="max-w-2xl text-center mx-auto">
                    <p
                        class="inline-block text-sm font-medium bg-clip-text bg-gradient-to-l from-green-600 to-violet-500 text-transparent dark:from-green-400 dark:to-violet-400">
                        Nano: A vision for 2024
                    </p>

                    <div class="mt-5 max-w-2xl">
                        <h1 class="block font-semibold text-gray-800 text-4xl md:text-5xl lg:text-6xl dark:text-gray-200">
                            Welcome to Our Online Shopping Site
                        </h1>
                    </div>

                    <div class="mt-5 max-w-3xl">
                        <p class="text-lg text-gray-600 dark:text-gray-400">At Online Shooping, we're passionate about providing you with an exceptional online shopping experience. Our team is dedicated to offering you a wide range of high-quality products, excellent customer service, and a seamless shopping journey from start to finish.</p>
                    </div>

                    <!-- Buttons -->
                    <div class="mt-8 gap-3 flex justify-center">
                        <a class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="{{route('products.display')}}">
                            Get started To Shopping
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
