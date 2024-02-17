@extends('common.masterLayout')


@section('middle-section')
    <div class="w-full min-h-[80vh] mt-2 grid grid-cols-12 space-x-5">
        <div class="col-span-3 w-full min-h[80vh] bg-[#20354b] flex flex-col items-center rounded-xl">
            <div class="mt-2 px-2">
                {{-- edit profile icon --}}
                <div class="w-full flex justify-between items-center">
                    <div class=" text-white text-sm">
                        <span class="text-gray-400 font-semibold">Role:</span>
                        <span class="text-emerald-400 font-bold uppercase">{{ Auth::user()->role }}</span>
                    </div>

                    <a href="{{ route('profile.edit') }}" class="text-emerald-400">
                        <svg class="text-white bg-white p-2 rounded-full w-8 h-8" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <path
                                d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                        </svg>
                    </a>
                </div>

                <div class="mt-6 w-fit mx-auto ">
                    @if (Auth::user()->image)
                        <img src="/profile/{{ Auth::user()->image }}"class="rounded-full border-2 w-16" alt="">
                    @else
                        <img src="https://th.bing.com/th/id/R.8cb04c9257b4a8c80ab792437cfefc9a?rik=KbBqtj0az%2bTDGA&pid=ImgRaw&r=0"
                            class="rounded-full border-2 w-16" alt="">
                    @endif
                </div>
                <div class="mt-4 text-center">
                    <h2 class="text-white font-bold text-2xl tracking-wide">{{ Auth::user()->name }}</h2>
                    <p class="text-emerald-400 font-semibold mt-2">
                        {{ Auth::user()->email }}
                    </p>
                    @if (Auth::user()->phone)
                        <p class="text-gray-200 font-semibold mt-2">
                            {{ Auth::user()->phone }}
                        </p>
                    @endif
                </div>
                <div class="h-1 w-full bg-black mt-4 rounded-full">
                    <div class="h-1 rounded-full w-5/5 bg-yellow-500 "></div>
                </div>
            </div>


            <ul class="flex flex-col justify-center items-center my-10 w-full space-y-5 px-2">
                {{-- <a href="{{ route('profile.edit') }}"
                    class="flex justify-center items-center rounded-xl text-white w-full py-2 hover:scale-105 duration-300">
                    <li>Admin Profile</li>
                </a> --}}
                <a href="{{ route('admin.dashboard.allUsers') }}"
                    class="flex justify-center items-center text-white rounded-xl text-whit w-full  py-2 hover:scale-105 duration-300 {{ request()->routeIs('admin.dashboard.allUsers') ? 'border shadow-lg' : '' }}">
                    <li>All Users</li>
                </a>
                <a href="{{ route('admin.dashboard.allProducts') }}"
                    class="flex justify-center items-center  rounded-xl text-white w-full py-2 hover:scale-105 duration-300 {{ request()->routeIs('admin.dashboard.allProducts') ? 'border shadow-lg' : '' }}">
                    <li>All Products</li>
                </a>
                <a href="{{route("admin.dashboard.messages")}}"
                    class="flex justify-center items-center  rounded-xl text-white w-full py-2 hover:scale-105 duration-300 {{ request()->routeIs('admin.dashboard.messages') ? 'border shadow-lg' : '' }}">
                    <li>All Messages</li>
                </a>

            </ul>

            <div class="flex-1">
            </div>

            <div class="w-full mb-5 px-2">
                <a href="#"
                    class="flex justify-center items-center rounded-lg text-white border shadow-lg py-2 hover:scale-105 duration-300 bg-red-500 w-full">
                    Log Out
                </a>
            </div>
        </div>

        <div class="w-full col-span-9">
            @yield('content-section')
        </div>
    </div>
@endsection
