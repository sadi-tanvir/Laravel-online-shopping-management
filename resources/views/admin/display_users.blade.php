@extends('layouts.admin_dashboard_layout')


@section('content-section')
    <h1 class="text-5xl text-gray-700 font-bold">uers's Lists</h1>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 border-b">
                <tr>
                    <th scope="col" class="px-6 py-3">User Id</th>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">User Photo</th>
                    <th scope="col" class="px-6 py-3">Details</th>
                    <th scope="col" class="px-6 py-3">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->id }}
                        </th>
                        <td class="px-6 py-4">{{ $user->name }}</td>
                        <td class="px-6 py-4">{{ $user->email }}</td>
                        <td class="px-6 py-4">

                            @if ($user->image)
                                <img src="/profile/{{ $user->image }}"class="w-14 h-14 rounded-full border-2"
                                    alt="">
                            @else
                                <img src="https://th.bing.com/th/id/R.8cb04c9257b4a8c80ab792437cfefc9a?rik=KbBqtj0az%2bTDGA&pid=ImgRaw&r=0"
                                    class="w-14 h-14 rounded-full border-2" alt="">
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <a class="bg-green-500 px-4 py-1 rounded-lg my-2 text-white"
                                href="{{ route('admin.dashboard.user.details', $user->id) }}">
                                Details
                            </a>
                        </td>
                        {{-- <td class="px-6 py-4">
                            <a class="bg-red-500 px-4 py-1 rounded-lg my-2 text-white" href="#">
                                Delete
                            </a>
                        </td> --}}
                        <td class="px-6 py-4">
                            <form method="POST" action="/admin/dashboard/user/{{ $user->id }}/delete">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-1 bg-red-500 text-white rounded-lg">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
