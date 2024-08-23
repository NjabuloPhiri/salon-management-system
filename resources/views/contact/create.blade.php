@extends('layouts')

@section('title', 'Contact Us')

@section('content')
    <div class="max-w-2xl mx-auto px-4 py-6 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Contact Us</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded-md mb-4">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded-md mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <section class="py-12 bg-cover bg-center" style="background-image: url('https://img.freepik.com/premium-photo/various-brushes-cosmetics-purple-tint_23-2148181401.jpg');"></section>
        <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                <input type="text" id="name" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring focus:ring-pink-500 focus:ring-opacity-50" required>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="email" id="email" name="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring focus:ring-pink-500 focus:ring-opacity-50" required>
            </div>

            <div>
                <label for="message" class="block text-sm font-medium text-gray-700">Message:</label>
                <textarea id="message" name="message" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring focus:ring-pink-500 focus:ring-opacity-50" required></textarea>
            </div>

            <div>
                <button type="submit" class="bg-pink-500 text-white py-2 px-4 rounded-md shadow-sm hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-opacity-50">Send Message</button>
            </div>
        </form>
    </div>
@endsection
