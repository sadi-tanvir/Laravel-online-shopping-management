<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    {{-- tailwind css CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="relative container mx-auto mt-10">
        <x-navbar />
        {{-- @include('common.navbar') --}}

        @if ($message = Session::get('success'))
            <h1 id="successMessage" class="text-xl bg-green-500 text-white py-2 px-5 rounded-lg absolute right-0 top-20">
                {{ $message }}
            </h1>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var successMessage = document.getElementById('successMessage');
                    if (successMessage) {
                        setTimeout(function() {
                            successMessage.style.display = 'none';
                        }, 5000);
                    }
                });
            </script>
        @endif

        @yield('middle-section')
    </div>


    {{-- footer section --}}
    <x-footer />

    @include('components.Ajax_js')
</body>

</html>
