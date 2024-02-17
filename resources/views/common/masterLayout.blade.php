<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                // Wait for the DOM to be fully loaded
                document.addEventListener('DOMContentLoaded', function() {
                    // Get the success message element
                    var successMessage = document.getElementById('successMessage');
                    // Check if the success message element exists
                    if (successMessage) {
                        // Hide the success message after 5 seconds
                        setTimeout(function() {
                            successMessage.style.display = 'none';
                        }, 5000); // 5000 milliseconds = 5 seconds
                    }
                });
            </script>
        @endif

        @yield('middle-section')
    </div>



    {{-- footer --}}
    <x-footer />

</body>

</html>
