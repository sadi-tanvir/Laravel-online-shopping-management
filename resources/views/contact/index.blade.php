@extends('layouts.app_layout')


@section('middle-section')
    <div class="container mx-auto min-h-[70vh] px-4 lg:px-20 mt-20">
        <div class="w-full mx-auto p-8 my-4 md:px-12 lg:w-9/12 mr-auto rounded-2xl shadow-2xl border flex flex-col">
            <h1 class="font-bold uppercase text-4xl">Send us a message</h1>
            <form action="/contact/send" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-5 md:grid-cols-3 mt-5">
                    <div>
                        <input name="name" {{ old('name') }}
                            class="w-full bg-gray-100 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline"
                            type="text" placeholder="Full Name*" />
                        @if ($errors->has('name'))
                            <span class="text-red-500">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div>
                        <input name="email" {{ old('email') }}
                            class="w-full bg-gray-100 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline"
                            type="email" placeholder="Email*" />
                        @if ($errors->has('email'))
                            <span class="text-red-500">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div>
                        <input name="phone" {{ old('phone') }}
                            class="w-full bg-gray-100 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline"
                            type="number" placeholder="Phone*" />
                        @if ($errors->has('phone'))
                            <span class="text-red-500">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                </div>
                <div class="my-4">
                    <textarea name="message" placeholder="Message*"
                        class="w-full h-32 xl:h-48 bg-gray-100 text-gray-600 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline">{{ old('message') }}</textarea>
                    {{-- @if ($errors->has('message')) --}}
                    <span class="text-red-500">{{ $errors->first('message') }}</span>
                    {{-- @endif --}}
                </div>
                <button
                    class="uppercase text-sm font-bold tracking-wide bg-green-600 text-gray-100 p-3 rounded-lg w-full xl:w-2/6 
              focus:outline-none focus:shadow-outline">
                    Send Message
                </button>
            </form>
        </div>
    </div>
@endsection
