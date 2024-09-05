@extends('layouts')

@section('title', 'LALIES GLAM STUDIO')

@section('content')
<!-- Hero Section with Video Background -->
<section class="relative overflow-hidden bg-gradient-to-r from-pink-300 to-pink-500 text-gray-900 py-12 md:py-24">
    <video class="absolute inset-0 w-full h-full object-cover z-0" autoplay muted loop>
        <source src="path_to_your_video.mp4" type="video/mp4">
    </video>
    <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRCdDcncQwAMNGSVP7hx1XnddM05ZB892g5YA&s"
            alt="Company Logo" class="mx-auto mb-5 h-25">
        <h1 class="text-5xl font-bold mb-4 text-white drop-shadow-lg typewriter"
            style="font-family: 'Linden Hill', serif;">LALIES' GLAM STUDIO</h1>
        <p class="text-xl text-white mb-6">Your premier destination for beauty and makeup excellence.</p>
        <a href="{{ route('booking.create') }}"
            class="bg-white text-pink-500 py-2 px-6 rounded-md hover:bg-pink-600 hover:text-white transition duration-300 shadow-lg">Book
            an Appointment</a>
    </div>
</section>

<!-- Services Overview Section with Background Image -->
<section class="py-12 bg-cover bg-center"
    style="background-image: url('https://img.freepik.com/premium-photo/various-brushes-cosmetics-purple-tint_23-2148181401.jpg');">
    <div class="bg-gradient-to-r from-pink-200 via-pink-300 to-transparent py-12">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-semibold mb-8 text-center text-pink-600"
                style="font-family: 'Linden Hill', cursive;" data-aos="fade-down">Our Services</h2>
            <div class="sm:flex sm:justify-center gap-x-10">
                <!--   ✅ Product card - Starts Here 👇 -->
                <div class="flex flex-wrap gap-4">
                    @foreach($services as $service)
                        <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
                            <a href="#">
                                <img src="{{ asset('images/' . $service->category . '.jpg') }}" alt="{{ $service->name }}"
                                    class="h-80 w-72 object-cover rounded-t-xl" />
                                <div class="px-4 py-3 w-72">
                                    <span class="text-gray-400 mr-3 uppercase text-xs">{{ $service->category }}</span>
                                    <p class="text-lg font-bold text-black truncate block capitalize">{{ $service->name }}
                                    </p>
                                    <div class="flex items-center">
                                        <p class="text-lg font-semibold text-black cursor-auto my-3">R{{ $service->price }}
                                        </p>
                                        <div class="ml-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                                                <path
                                                    d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>


</section>

<div class="text-center mt-8">
    <a href="{{ route('services') }}" class="bg-pink-600 text-white py-2 px-4 rounded-full hover:bg-pink-700">
        View All Services
    </a>
</div>


<!-- About Us Section with Background Image -->
<section class="py-12 bg-cover bg-center"
    style="background-image: url('https://bellezzasoul.com/cdn/shop/collections/top-view-arrangement-with-beauty-bag-copy-space.jpg?v=1662411531&width=1500');">
    <div class="bg-gradient-to-b from-pink-50 to-transparent py-12">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-semibold mb-8 text-center text-pink-600"
                style="font-family: 'Linden Hill', cursive;" data-aos="fade-up">About Us</h2>
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="flex-1" data-aos="fade-right" data-aos-duration="1000">
                    <p class="text-gray-800">Founded by Phumeza Kalipa in 2019, Lalies Glam Studio is a renowned beauty
                        salon situated in Khayelitsha’s Mandela Park, Cape Town. We empower women by enhancing their
                        natural beauty, offering a wide range of services from makeup applications to luxurious hair
                        treatments.</p>
                </div>
                <div class="flex-1" data-aos="fade-left" data-aos-duration="1000">
                    <p class="text-gray-800">Our meticulous manicure and pedicure services ensure every detail is
                        perfect. We also offer soothing hand and foot massages for ultimate relaxation, and a curated
                        selection of beauty products to continue your self-care routine at home.</p>
                </div>
            </div>
            <div class="text-center mt-8">
                <a href="{{ route('about') }}" class="text-pink-600 hover:underline">Learn More About Us</a>
            </div>
        </div>
    </div>
</section>

<!-- Contact Us Section with Map -->
<section class="py-12 bg-pink-200">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-semibold mb-8 text-center text-pink-600" style="font-family: 'Linden Hill', cursive;"
            data-aos="fade-up">Contact Us</h2>
        <div class="text-center mb-8">
            <p class="text-gray-700 mb-6">Have questions or need more information? Reach out to us and we’ll respond
                promptly.</p>
            <a href="{{ route('contact.create') }}"
                class="bg-white text-pink-600 py-2 px-6 rounded-md hover:bg-pink-500 hover:text-white transition duration-300 shadow-lg">Contact
                Us</a>
        </div>
        <div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.4637863566246!2d27.931179315150485!3d-34.00071088060321!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e951d12c4c74c41%3A0xfed5fef3e6a7c4b3!2sMandela%20Park%2C%20Khayelitsha%2C%20Cape%20Town%2C%20South%20Africa!5e0!3m2!1sen!2sus!4v1621952106272!5m2!1sen!2sus"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Initialize AOS with enhanced effects
        AOS.init({
            duration: 1500,
            easing: 'ease-in-out',
            once: true, // Only animate once when elements are in view
        });

        // Typewriter Effect
        const typewriterElement = document.querySelector('.typewriter');
        if (typewriterElement) {
            const animationDuration = 4000; // Duration in milliseconds

            // Apply the complete class after the typewriter animation ends
            setTimeout(() => {
                typewriterElement.classList.add('complete');
            }, animationDuration);
        }

        // Parallax Effect
        const parallaxBg = document.querySelector('.parallax-bg');
        if (parallaxBg) {
            window.addEventListener('scroll', () => {
                const scrollPosition = window.pageYOffset;
                parallaxBg.style.transform = 'translateY(' + scrollPosition * 0.5 + 'px)';
            });
        }

        // Smooth Scrolling
        const links = document.querySelectorAll('a[href^="#"]');
        links.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                document.querySelector(link.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Mobile Menu Toggle (if applicable)
        const menuButton = document.querySelector('#menu-button');
        const menu = document.querySelector('#menu');

        if (menuButton && menu) {
            menuButton.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });
        }

        // Form Validation (Example)
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            form.addEventListener('submit', (e) => {
                const inputs = form.querySelectorAll('input, textarea');
                let isValid = true;

                inputs.forEach(input => {
                    if (!input.value.trim()) {
                        isValid = false;
                        input.classList.add('border-red-500');
                    } else {
                        input.classList.remove('border-red-500');
                    }
                });

                if (!isValid) {
                    e.preventDefault();
                    alert('Please fill in all required fields.');
                }
            });
        });
    });
</script>
@endsection

<style>
    @keyframes typewriter {
        from {
            width: 0;
        }

        to {
            width: 100%;
        }
    }

    .typewriter {
        font-family: 'Playfair Display', serif;
        font-size: 3rem;
        white-space: nowrap;
        overflow: hidden;
        border-right: 4px solid white;
        animation: typewriter 4s steps(40, end) forwards;
        display: inline-block;
    }

    .typewriter.complete {
        border-right: none;
        /* Hide the cursor */
    }

    @keyframes bounce {

        0%,
        20%,
        50%,
        80%,
        100% {
            transform: translateY(0);
        }

        40% {
            transform: translateY(-30px);
        }

        60% {
            transform: translateY(-15px);
        }
    }

    .text-gray-800 {
        color: #333;
        /* Darker gray for better readability */
    }

    .bg-white {
        background-color: #ffffff;
        /* Ensure background color is white */
    }

    /* Additional Styles for Enhanced Appearance */
    .text-pink-600 {
        color: #d36f8d;
        /* Use a richer pink for headings */
    }

    .bg-pink-50 {
        background-color: #fbeff3;
        /* Light pink background */
    }

    .bg-pink-200 {
        background-color: #f8e8f4;
        /* Soft pink background */
    }
</style>