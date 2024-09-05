<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full bg-gray-100">
    <header>
        <nav class="bg-white shadow-md">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">


                    <!-- Desktop Menu -->
                    <div class="hidden md:flex md:ml-10">
                        <div class="flex items-center space-x-4">
                            <a href="{{ route('home') }}" class="text-gray-800 hover:bg-gray-200 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                            
                            <a href="{{ route('booking.create') }}" class="text-gray-800 hover:bg-gray-200 px-3 py-2 rounded-md text-sm font-medium">Book Now</a>
                            <a href="{{ route('contact.create') }}" class="text-gray-800 hover:bg-gray-200 px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                            <a href="{{ route('about') }}" class="text-gray-800 hover:bg-gray-200 px-3 py-2 rounded-md text-sm font-medium">About Us</a>

                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <a href="{{ route('login') }}" class="text-gray-800 hover:bg-gray-200 px-3 py-2 rounded-md text-sm font-medium">Login</a>
                                @endif

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="text-gray-800 hover:bg-gray-200 px-3 py-2 rounded-md text-sm font-medium">Register</a>
                                @endif
                            @else
                                <div class="relative">
                                    <button id="navbarDropdown" class="text-gray-800 hover:bg-gray-200 px-3 py-2 rounded-md text-sm font-medium" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </button>
                                    <div class="dropdown-menu absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md py-1 hidden">
                                        <a href="{{ route('logout') }}" 
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                                           class="block px-4 py-2 text-gray-800 hover:bg-gray-200">
                                           Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            @endguest
                        </div>
                    </div>

                    <!-- Mobile Menu Button -->
                    <div class="-mr-2 flex md:hidden">
                        <button type="button" class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <!-- Hamburger Icon -->
                            <svg class="block h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                            <!-- Close Icon -->
                            <svg class="hidden h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div class="md:hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <a href="{{ route('home') }}" class="bg-gray-800 text-white block px-3 py-2 rounded-md text-base font-medium">Home</a>
                    
                    <a href="{{ route('booking.create') }}" class="text-gray-800 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Book Now</a>
                    <a href="{{ route('contact.create') }}" class="text-gray-800 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Contact</a>
                    <a href="{{ route('about') }}" class="text-gray-800 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">About Us</a>

                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="text-gray-800 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Login</a>
                        @endif

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-gray-800 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Register</a>
                        @endif
                    @else
                        <a id="navbarDropdownMobile" class="text-gray-800 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           class="text-gray-800 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Logout</a>
                    @endguest
                </div>
            </div>
        </nav>
    </header>

    <main class="py-4">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-gray-100 py-4">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.</p>
            <div class="mt-2 flex justify-center space-x-4">
                <a href="https://facebook.com" target="_blank" class="text-gray-100 hover:text-pink-500"><i class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com" target="_blank" class="text-gray-100 hover:text-pink-500"><i class="fab fa-twitter"></i></a>
                <a href="https://instagram.com" target="_blank" class="text-gray-100 hover:text-pink-500"><i class="fab fa-instagram"></i></a>
                <a href="https://linkedin.com" target="_blank" class="text-gray-100 hover:text-pink-500"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <div class="mt-4 text-sm">
                <p>Lalies Glam Studio</p>
                <p>Mandela Park, Khayelitsha</p>
                <p>Cape Town, South Africa</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const menuButton = document.querySelector('[aria-controls="mobile-menu"]');
            const menu = document.getElementById('mobile-menu');
            const openIcon = menuButton.querySelector('svg.block');
            const closeIcon = menuButton.querySelector('svg.hidden');

            menuButton.addEventListener('click', () => {
                menu.classList.toggle('hidden');
                openIcon.classList.toggle('hidden');
                closeIcon.classList.toggle('hidden');
            });

            // Handle mobile dropdown menu
            const dropdownButton = document.getElementById('navbarDropdownMobile');
            const dropdownMenu = document.querySelector('.dropdown-menu');

            if (dropdownButton && dropdownMenu) {
                dropdownButton.addEventListener('click', () => {
                    dropdownMenu.classList.toggle('hidden');
                });
            }
        });
    </script>
</body>
</html>
