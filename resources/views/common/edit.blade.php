@extends('common.masterLayout')


@section('middle-section')
    <section class="bg-gray-50 min-h-screen mt-12 xl:mt-20">
        <!-- login container -->
        <div class="bg-gray-100 rounded-2xl shadow-lg w-1/2 p-5 mx-auto">
            <div class="md:w-full px-8 md:px-16 mx-auto py-10">
                <h2 class="font-bold text-2xl text-[#002D74] text-center">Update <span
                        class="text-emerald-400">{{ Auth::user()->role }}</span>'s profile</h2>
                <div class="mt-6 w-fit mx-auto ">
                    @if (Auth::user()->image)
                        <img src="/profile/{{ Auth::user()->image }}" class="rounded-full border-2 w-24 "
                            alt="profile picture" srcset="">
                    @else
                        <img src="https://th.bing.com/th/id/R.8cb04c9257b4a8c80ab792437cfefc9a?rik=KbBqtj0az%2bTDGA&pid=ImgRaw&r=0"
                            class="rounded-full border-2 w-24 " alt="profile picture" srcset="">
                    @endif
                </div>

                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data"
                    class="flex flex-col gap-4">
                    @csrf
                    @method('PATCH')
                    {{-- name --}}
                    <div class="flex flex-col">
                        <input class="p-2 mt-8 rounded-xl border" type="text" name="name"
                            value="{{ old('name', Auth::user()->name) }}" placeholder="name">
                        @if ($errors->has('name'))
                            <span class="text-red-500">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    {{-- email --}}
                    <div class="flex flex-col">
                        <input class="p-2 my-2 rounded-xl border" type="email" name="email"
                            value="{{ old('email', Auth::user()->email) }}" placeholder="Email">
                        @if ($errors->has('email'))
                            <span class="text-red-500">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    {{-- email --}}
                    <div class="flex flex-col">
                        <input class="p-2 my-2 rounded-xl border" type="text" name="phone"
                            value="{{ old('phone', Auth::user()->phone) }}" placeholder="phone">
                        @if ($errors->has('phone'))
                            <span class="text-red-500">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>

                    <div class="mb-5">
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">profile
                            photo</label>
                        <input type="file" id="image" name="image"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @if ($errors->has('image'))
                            <span class="text-red-500">{{ $errors->first('image') }}</span>
                        @endif
                    </div>


                    <button type="submit" class="bg-[#002D74] rounded-xl text-white py-2 hover:scale-105 duration-300">
                        Update
                    </button>
                </form>
            </div>

            {{-- <!-- image -->
        <div class="md:block hidden w-1/2">
            <img class="rounded-2xl"
                src="https://th.bing.com/th/id/OIP.ue4UHSyECiNnvhVbylWofgHaHa?rs=1&pid=ImgDetMain">
        </div> --}}
        </div>
    </section>
@endsection
