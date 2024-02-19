@extends('layouts.app_layout')


@section('middle-section')
    <section style="font-family: Montserrat"
        class=" bg-gray-200 rounded-3xl flex font-medium items-center justify-center h-[90vh] xl:h-[80vh] mt-20 w-4/6 mx-auto">
        <div class="w-3/6 mx-auto bg-[#20354b]  rounded-2xl px-8 py-16 shadow-lg">
            {{-- edit profile icon --}}
            <div class="w-full flex">
                <div class=" text-white text-sm">
                    <span class="text-gray-400 font-semibold">Role:</span>
                    <span class="text-emerald-400 font-bold uppercase">{{ Auth::user()->role }}</span>
                </div>

                <a href="{{ route('profile.edit') }}" class="text-emerald-400 ml-auto">
                    <svg class="text-white bg-white p-2 rounded-full w-8 h-8" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512">
                        <path
                            d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                    </svg>
                </a>
            </div>

            {{-- profile photo --}}
            <div class="mt-6 w-fit mx-auto ">
                @if (Auth::user()->image)
                    <img src="/profile/{{ Auth::user()->image }}" class="rounded-full border-2 w-28 " alt="profile picture"
                        srcset="">
                @else
                    <img src="https://th.bing.com/th/id/R.8cb04c9257b4a8c80ab792437cfefc9a?rik=KbBqtj0az%2bTDGA&pid=ImgRaw&r=0"
                        class="rounded-full border-2 w-28 " alt="profile picture" srcset="">
                @endif
            </div>

            <div class="mt-8 text-center">
                <h2 class="text-white font-bold text-2xl tracking-wide capitalize">{{ Auth::user()->name }}</h2>
                <p class="text-emerald-400 font-semibold mt-2.5">
                    {{ Auth::user()->email }}
                </p>
                @if (Auth::user()->phone)
                    <p class="text-gray-200 font-semibold mt-2.5">
                        {{ Auth::user()->phone }}
                    </p>
                @endif
            </div>

            <div class="h-1 w-full bg-black mt-8 rounded-full">
                <div class="h-1 rounded-full w-5/5 bg-yellow-500 "></div>
            </div>
        </div>
    </section>
@endsection
