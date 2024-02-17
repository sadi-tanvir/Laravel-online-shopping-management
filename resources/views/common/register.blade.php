@extends('common.masterLayout')


@section('middle-section')
    <section class="bg-gray-50 min-h-screen flex items-center justify-center">
        <div class="bg-gray-100 flex rounded-2xl shadow-lg max-w-3xl p-5 items-center">
            <!-- image -->
            <div class="md:block hidden w-1/2">
                <img class="rounded-2xl" src="https://www.labfellows.com/wp-content/uploads/2020/08/mobile-1.png">
            </div>

            <!-- form -->
            <div class="md:w-1/2 px-8 md:px-16">
                <h2 class="font-bold text-2xl text-[#002D74]">Register</h2>
                <p class="text-xs mt-4 text-[#002D74]">If you are not registered, then you can easily register</p>

                <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-4">
                    @csrf
                    {{-- name --}}
                    <div class="flex flex-col">
                        <input class="p-2 mt-8 rounded-xl border" type="text" name="name" value="{{ old('name') }}"
                            placeholder="Full Name">
                        @if ($errors->has('name'))
                            <span class="text-red-500">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    {{-- email --}}
                    <div class="flex flex-col">
                        <input class="p-2  rounded-xl border" type="email" name="email" value="{{ old('email') }}"
                            placeholder="Email">
                        @if ($errors->has('email'))
                            <span class="text-red-500">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    {{-- password --}}
                    <div class="">
                        <input class="p-2 rounded-xl border w-full" type="password" name="password" placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="text-red-500">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    {{-- confirm password --}}
                    <div class="">
                        <input class="p-2 rounded-xl border w-full" type="password" name="password_confirmation"
                            placeholder="confirmation password">
                        @if ($errors->has('password_confirmation'))
                            <span class="text-red-500">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                    </div>

                    <button type="submit" class="bg-[#002D74] rounded-xl text-white py-2 hover:scale-105 duration-300">
                        Register
                    </button>
                </form>

                <div class="mt-3 text-xs flex justify-between items-center text-[#002D74]">
                    <p>Already have an account?</p>
                    <a href="{{ route('login') }}"
                        class="py-2 px-5 bg-white border rounded-xl hover:scale-110 duration-300">login</a>
                </div>
            </div>
        </div>
    </section>
@endsection
