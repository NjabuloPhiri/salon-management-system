<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Linden+Hill:ital@0;1&display=swap');
    </style>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="h-full bg-gray-100">
    <header>
        <nav class="bg-pink-500">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <!-- Desktop Menu -->
                    <div class="flex items-center space-x-4 flex-grow">
                        <a href="{{ route('home') }}"
                            class="text-white hover:bg-pink-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        <a href="{{ route('services') }}"
                            class="text-white hover:bg-pink-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Services</a>
                        <a href="{{ route('booking.create') }}"
                            class="text-white hover:bg-pink-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Book
                            Now</a>
                        <a href="{{ route('contact.create') }}"
                            class="text-white hover:bg-pink-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                        <a href="{{ route('about') }}"
                            class="text-white hover:bg-pink-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium">About
                            Us</a>




                        <!-- Mobile Menu Button -->
                        <div class="-mr-2 flex md:hidden">
                            <button type="button"
                                class="bg-pink-500 inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-pink-400 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-pink-500"
                                aria-controls="mobile-menu" aria-expanded="false">
                                <span class="sr-only">Open main menu</span>
                                <!-- Hamburger Icon -->
                                <svg class="block h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                                <!-- Close Icon -->
                                <svg class="hidden h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div class="md:hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <a href="{{ route('home') }}"
                        class="bg-pink-400 text-white block px-3 py-2 rounded-md text-base font-medium">Home</a>
                    <a href="{{ route('services') }}"
                        class="text-white hover:bg-pink-400 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Services</a>
                    <a href="{{ route('booking.create') }}"
                        class="text-white hover:bg-pink-400 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Book
                        Now</a>
                    <a href="{{ route('contact.create') }}"
                        class="text-white hover:bg-pink-400 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Contact</a>
                    <a href="{{ route('about') }}"
                        class="text-white hover:bg-pink-400 hover:text-white block px-3 py-2 rounded-md text-base font-medium">About
                        Us</a>

                    <!-- Authentication Links -->
                    @guest
                        <div class="flex flex-col space-y-2">
                            <a href="{{ route('login') }}"
                                class="text-white bg-pink-600 hover:bg-pink-700 block px-3 py-2 rounded-md text-base font-medium">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="text-white bg-pink-600 hover:bg-pink-700 block px-3 py-2 rounded-md text-base font-medium">Register</a>
                            @endif
                        </div>
                    @endguest

                    @auth
                        <a id="navbarDropdown"
                            class="text-white hover:bg-pink-400 hover:text-white block px-3 py-2 rounded-md text-base font-medium"
                            href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="text-white hover:bg-pink-400 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endauth
                </div>
            </div>
        </nav>
    </header>

    <main class="flex">
        <!-- Main Content -->
        <div class="flex-1 p-6">
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                @yield('content')
            </div>
        </div>

        <!-- Sidebar -->
        <aside class="w-64 bg-pink-200 p-4">
            <!-- Authentication Links for Desktop -->
            @guest
                <div class="flex flex-col space-y-2">
                    <a href="{{ route('login') }}"
                        class="text-pink-600 hover:bg-pink-100 block px-3 py-2 rounded-md text-base font-medium">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="text-pink-600 hover:bg-pink-100 block px-3 py-2 rounded-md text-base font-medium">Register</a>
                    @endif
                </div>
            @endguest

            @auth
                <a id="navbarDropdown"
                    class="text-pink-600 hover:bg-pink-100 block px-3 py-2 rounded-md text-base font-medium" href="#"
                    role="button" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="text-pink-600 hover:bg-pink-100 block px-3 py-2 rounded-md text-base font-medium">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endauth
        </aside>
    </main>

    <footer class="bg-pink-100 text-gray-800 py-4">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <p>&copy; {{ date('Y') }} Lalies Glam Studio. All rights reserved.</p>
            <div class="mt-2 flex justify-center space-x-4">
                <a href="https://facebook.com" target="_blank" class="text-gray-800 hover:text-pink-500"><i
                        class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com" target="_blank" class="text-gray-800 hover:text-pink-500"><i
                        class="fab fa-twitter"></i></a>
                <a href="https://instagram.com" target="_blank" class="text-gray-800 hover:text-pink-500"><i
                        class="fab fa-instagram"></i></a>
                <a href="https://linkedin.com" target="_blank" class="text-gray-800 hover:text-pink-500"><i
                        class="fab fa-linkedin-in"></i></a>
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
                if (menu.classList.contains('hidden')) {
                    menu.classList.remove('hidden');
                    openIcon.classList.add('hidden');
                    closeIcon.classList.remove('hidden');
                } else {
                    menu.classList.add('hidden');
                    openIcon.classList.remove('hidden');
                    closeIcon.classList.add('hidden');
                }
            });
        });
    </script>
</body>

</html>