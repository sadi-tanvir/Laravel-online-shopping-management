<nav class=" border-b-2 border-gray-200 dark:bg-gray-900">
    <div class="flex flex-wrap items-center justify-between mx-auto pb-4">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="/logo.png" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Online Shopping</span>
        </a>

        <div class="w-auto" id="navbar-default">
            <ul
                class="font-medium flex flex-col items-center p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0">

                @section('menu-items')
                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-800 rounded md:bg-transparent"
                            aria-current="page"></a>
                    </li>

                    <li>
                        <a href="{{ route('products.display') }}"
                            class="block py-2 px-3  rounded md:bg-transparent {{ request()->routeIs('products.display') ? 'text-gray-500 border shadow px-5' : '' }}"
                            aria-current="page">
                            Products
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('about.us') }}"
                            class="block py-2 px-3  rounded md:bg-transparent {{ request()->routeIs('about.us') ? 'text-gray-500 border shadow px-5' : '' }}"
                            aria-current="page">
                            About
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{ route('contact.us') }}"
                            class="block py-2 px-3  rounded md:bg-transparent {{ request()->routeIs('contact.us') ? 'text-gray-500 border shadow px-5' : '' }}"
                            aria-current="page">
                            Contact
                        </a>
                    </li>


                    @if (Auth::check())
                        @if (Auth::user()->role === 'admin')
                            <li>
                                <a href="{{ route('admin.dashboard.users.display') }}"
                                    class="block py-2 px-3 text-gray-800 rounded md:bg-transparent {{ request()->routeIs('admin.dashboard.users.display') ? 'text-gray-500 border shadow px-5' : '' }}"
                                    aria-current="page">Admin
                                    Dashboard</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('user.dashboard') }}"
                                    class="block py-2 px-3  rounded md:bg-transparent {{ request()->routeIs('user.dashboard') ? 'text-gray-500 border shadow px-5' : '' }}"
                                    aria-current="page">User
                                    profile</a>
                            </li>
                        @endif


                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a class="text-red-500" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                    Log Out
                                </a>
                            </form>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}"
                                class="block py-2 px-3 rounded md:bg-transparent {{ request()->routeIs('login') ? 'text-gray-500 border shadow px-5' : 'text-gray-800' }}"
                                aria-current="page">Login</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}"
                                class="block py-2 px-3  rounded md:bg-transparent {{ request()->routeIs('register') ? 'text-gray-500 border shadow-md px-5' : 'text-gray-800' }}"
                                aria-current="page">Register</a>
                        </li>
                    @endif
                @show
            </ul>
        </div>
    </div>
</nav>
