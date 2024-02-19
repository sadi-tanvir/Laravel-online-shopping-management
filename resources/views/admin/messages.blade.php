@extends('layouts.admin_dashboard_layout')


@section('content-section')
    <h1 class="text-5xl text-gray-700 font-bold mb-5">Customer's Messages</h1>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 border-b">
                <tr>
                    <th scope="col" class="px-6 py-3">Message Id</th>
                    <th scope="col" class="px-6 py-3">Sender Name</th>
                    <th scope="col" class="px-6 py-3">Sender Email</th>
                    <th scope="col" class="px-6 py-3">Sender phone</th>
                    <th scope="col" class="px-6 py-3">Message</th>
                    <th scope="col" class="px-6 py-3">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $message->id }}
                        </th>
                        <td class="px-6 py-4">{{ $message->name }}</td>
                        <td class="px-6 py-4">{{ $message->email }}</td>
                        <td class="px-6 py-4">{{ $message->phone }}</td>
                        <td class="px-6 py-4">
                            {{ $message->message }}
                        </td>
                        <td class="px-6 py-4">
                            <form method="POST" action="/admin/dashboard/messages/{{ $message->id }}/delete">
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
