@extends('layouts')

@section('title', 'About')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-white text-gray-800">
    <div class="container mx-auto p-6">
        <header class="text-center mb-12">
            <h1 class="text-4xl font-bold text-pink-600" style="font-family: 'Linden Hill', cursive;"
                data-aos="fade-up">About Us</h1>
        </header>
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-4" style="font-family: 'Linden Hill', cursive;" data-aos="fade-up">Our
                Story</h2>
            <p class="leading-relaxed">
                Welcome to our salon! We are dedicated to providing you with the best service in a relaxing and friendly
                environment. Our team of experienced professionals is here to help you look and feel your best.
            </p>
        </section>
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-4" style="font-family: 'Linden Hill', cursive;" data-aos="fade-up">Our
                Mission</h2>
            <p class="leading-relaxed">
                Our mission is to offer top-notch beauty services while ensuring a comfortable and enjoyable experience
                for all our clients. We use high-quality products and the latest techniques to achieve the best results.
            </p>
        </section>
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-4" style="font-family: 'Linden Hill', cursive;" data-aos="fade-up">Our
                Team</h2>
            <p class="leading-relaxed">
                Our team consists of skilled and passionate professionals who are committed to excellence. We
                continuously update our skills and knowledge to provide you with the latest trends and styles.
            </p>
        </section>
    </div>
</body>

</html>
@endsection