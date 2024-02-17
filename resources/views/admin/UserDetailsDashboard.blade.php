@extends('admin.masterDashboardLayout')


@section('content-section')
    <div class="w-3/6 mx-auto rounded-2xl px-8 py-16 shadow-lg flex flex-col">
        {{-- profile photo --}}
        <div class="mt-6 w-fit mx-auto ">
            @if ($user->image)
                <img src="/profile/{{ $user->image }}" class="rounded-full border-2 w-28 " alt="profile picture"
                    srcset="">
            @else
                <img src="https://th.bing.com/th/id/R.8cb04c9257b4a8c80ab792437cfefc9a?rik=KbBqtj0az%2bTDGA&pid=ImgRaw&r=0"
                    class="rounded-full border-2 w-28 " alt="profile picture" srcset="">
            @endif
        </div>

        <div class="mt-8 text-center">
            <h2 class="text-gray-700 font-bold text-2xl tracking-wide capitalize">{{ $user->name }}</h2>
            <p class="text-gray-700 font-semibold mt-2.5">
                Email: {{ $user->email }}
            </p>
            @if ($user->phone)
                <p class="text-gray-700 font-semibold mt-2.5">
                    Phone: {{ $user->phone }}
                </p>
            @endif

            <p class="text-gray-700 font-semibold mt-2.5">
                Role: {{ $user->role }}
            </p>
        </div>
        <a href="{{ route('admin.dashboard.allUsers') }}"
            class="flex justify-center items-center text-white rounded-xl text-whit w-full  py-2 hover:scale-105 duration-300 bg-green-500 mt-7">
            back to users list
        </a>
    </div>
@endsection
