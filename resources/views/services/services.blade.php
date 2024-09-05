@extends('layouts')

@section('title', 'Services')

@section('content')
<div class="text-center p-10">
    <h1 class="font-bold text-4xl mb-4 text-pink-600" style="font-family: 'Linden Hill', cursive;" data-aos="fade-down">Our Services</h1>
</div>

<section id="Projects" class="w-fit mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-10 mb-5">
    @foreach(App\Models\Service::getServiceGroups() as $category => $services)
        <div class="bg-pink-200 shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">{{ $category }}</h2>
            
            <!-- Conditionally render images based on category -->
            @if($category == 'Manicure')
                <img class="w-full h-48 object-cover mb-4" src="{{ asset('images/manicure.jpg') }}" alt="Manicure">
            @elseif($category == 'Pedicure')
                <img class="w-full h-48 object-cover mb-4" src="{{ asset('images/pedicure.jpg') }}" alt="Pedicure">
            @elseif($category == 'Hair Installation')
                <img class="w-full h-48 object-cover mb-4" src="{{ asset('images/hair-installation.jpg') }}" alt="Hair Installation">
            @elseif($category == 'Natural Hair Service')
                <img class="w-full h-48 object-cover mb-4" src="{{ asset('images/natural-hair-service.jpg') }}" alt="Natural Hair Service">
            @elseif($category == 'Braids')
                <img class="w-full h-48 object-cover mb-4" src="{{ asset('images/braids.jpg') }}" alt="Braids">
            @elseif($category == 'Extras')
                <img class="w-full h-48 object-cover mb-4" src="{{ asset('images/french-tip-nails.jpeg') }}" alt="Extras">
            @endif

            <ul class="list-disc pl-5">
                @foreach($services as $service)
                    <li>{{ $service['name'] }} - R{{ $service['price'] }}</li>
                @endforeach
            </ul>
        </div>
    @endforeach
</section>
@endsection
