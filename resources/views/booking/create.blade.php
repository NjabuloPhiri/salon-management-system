@extends('layouts')

@section('title', 'Book an Appointment')

@section('content')
<section class="bg-pink-100 py-12">
    <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-6 text-center text-pink-600" style="font-family: 'Linden Hill', cursive;"
            data-aos="fade-up">Book an Appointment</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 mb-6 rounded-lg">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 mb-6 rounded-lg">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="py-12 bg-cover bg-center"
            style="background-image: url('https://img.freepik.com/premium-photo/various-brushes-cosmetics-purple-tint_23-2148181401.jpg');">
            <form action="{{ route('booking.store') }}" method="POST" id="booking-form"
                class="bg-white p-8 rounded-lg shadow-lg">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-gray-700 font-medium mb-2">Name:</label>
                        <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}"
                            required
                            class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                    </div>

                    <div>
                        <label for="phone" class="block text-gray-700 font-medium mb-2">Phone:</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone', auth()->user()->phone) }}"
                            class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                    </div>

                    <div class="md:col-span-2">
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email:</label>
                        <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                            required
                            class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                    </div>

                    <div class="md:col-span-2">
                        <label for="service_id" class="block text-gray-700 font-medium mb-2">Select Service:</label>
                        <select id="service_id" name="service_id" required
                            class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            @foreach($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }} - R{{ $service->price }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label for="appointment_date" class="block text-gray-700 font-medium mb-2">Appointment
                            Date:</label>
                        <input type="date" id="appointment_date" name="appointment_date"
                            value="{{ old('appointment_date') }}" required
                            class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                    </div>

                    <div class="md:col-span-2">
                        <label for="appointment_time" class="block text-gray-700 font-medium mb-2">Available Time
                            Slots:</label>
                        <select id="appointment_time" name="appointment_time" required
                            class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            <option value="">Select a time</option>
                        </select>
                    </div>

                    <div>
                        <label for="group_size" class="block text-gray-700 font-medium mb-2">Group Size:</label>
                        <input type="number" id="group_size" name="group_size" value="{{ old('group_size', 1) }}"
                            min="1"
                            class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                    </div>

                    <div>
                        <label for="payment_method" class="block text-gray-700 font-medium mb-2">Payment Method:</label>
                        <select id="payment_method" name="payment_method" required
                            class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500">
                            <!-- <option value="card" {{ old('payment_method') == 'card' ? 'selected' : '' }}>Credit/Debit Card</option> -->
                            <option value="cash" {{ old('payment_method') == 'cash' ? 'selected' : '' }}>Cash</option>
                        </select>
                    </div>

                    <div id="card-details" class="md:col-span-2 {{ old('payment_method') != 'card' ? 'hidden' : '' }}">
                        <label for="card-element" class="block text-gray-700 font-medium mb-2">Card Details:</label>
                        <div id="card-element" class="w-full border border-gray-300 rounded-md px-4 py-2"></div>
                        <div id="card-errors" class="text-red-600 mt-2"></div>
                    </div>
                </div>

                <button type="submit"
                    class="mt-6 bg-pink-600 text-white px-4 py-2 rounded-md hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-500">
                    Book Now
                </button>
                <button type="button"
                    class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400"
                    onclick="window.location.href='{{ url('/') }}'">
                    Cancel
                </button>
            </form>
        </section>
    </div>
</section>

<script src="https://js.stripe.com/v3/"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dateInput = document.getElementById('appointment_date');
        const timeSelect = document.getElementById('appointment_time');
        const cardDetails = document.getElementById('card-details');
        const paymentMethodSelect = document.getElementById('payment_method');
        const form = document.getElementById('booking-form');

        // Initialize Stripe
        const stripe = Stripe('your-publishable-key'); // Replace with your Stripe publishable key
        const elements = stripe.elements();
        const cardElement = elements.create('card');
        cardElement.mount('#card-element');
        const cardErrors = document.getElementById('card-errors');

        // Fetch available time slots
        dateInput.addEventListener('change', function () {
            const selectedDate = this.value;
            if (selectedDate) {
                fetch(`/booking/available-slots?date=${selectedDate}`)
                    .then(response => response.json())
                    .then(slots => {
                        timeSelect.innerHTML = '<option value="">Select a time</option>';
                        slots.forEach(slot => {
                            const option = document.createElement('option');
                            option.value = slot;
                            option.textContent = slot;
                            timeSelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching slots:', error);
                        timeSelect.innerHTML = '<option value="">Select a time</option>';
                    });
            } else {
                timeSelect.innerHTML = '<option value="">Select a time</option>';
            }
        });

        // Show/hide card details based on payment method
        paymentMethodSelect.addEventListener('change', function () {
            cardDetails.classList.toggle('hidden', this.value !== 'card');
        });

        // Handle form submission
        form.addEventListener('submit', function (event) {
            if (paymentMethodSelect.value === 'card') {
                event.preventDefault();
                stripe.createToken(cardElement).then(function (result) {
                    if (result.error) {
                        cardErrors.textContent = result.error.message;
                    } else {
                        const hiddenInput = document.createElement('input');
                        hiddenInput.setAttribute('type', 'hidden');
                        hiddenInput.setAttribute('name', 'stripeToken');
                        hiddenInput.setAttribute('value', result.token.id);
                        form.appendChild(hiddenInput);
                        form.submit();
                    }
                });
            }
        });
    });
</script>
@endsection