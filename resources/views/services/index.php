@extends('layouts.app')

@section('title', 'Services')

@section('content')
    <section class="bg-gray-100 py-12">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-center text-pink-600 mb-8">Our Services</h1>
            <ul class="space-y-6">
                @foreach ($services as $service)
                    <li class="bg-white p-6 rounded-lg shadow-md">
                        <img src="{{ $service->image_url }}" alt="{{ $service->name }}" class="w-full h-64 object-cover rounded-md mb-4">
                        <h3 class="text-2xl font-semibold text-pink-600 mb-2">{{ $service->name }}</h3>
                        <p class="text-gray-700 mb-2">{{ $service->description }}</p>
                        <p class="text-gray-900 font-bold">Price: ${{ number_format($service->price, 2) }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endsection
