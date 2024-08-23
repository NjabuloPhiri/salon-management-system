<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Charge;
use Carbon\Carbon;

class BookingController extends Controller
{
    // Show the booking form
    public function create()
    {
        $services = Service::all();
        return view('booking.create', compact('services'));
    }

    // Handle booking submission
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|string',
            'group_size' => 'required|integer|min:1',
            'payment_method' => 'required|string|in:card,cash',
            'stripeToken' => 'required_if:payment_method,card',
        ]);

        $dateTime = Carbon::parse($validated['appointment_date'] . ' ' . $validated['appointment_time']);

        // Validate that the selected slot is not already fully booked for the specific service
        $bookingCount = Appointment::whereDate('appointment_date', $validated['appointment_date'])
                                   ->where('appointment_time', $validated['appointment_time'])
                                   ->where('service_id', $validated['service_id'])
                                   ->sum('group_size');

        if ($bookingCount + $validated['group_size'] >= 12) {
            return redirect()->route('booking.create')->withErrors(['appointment_time' => 'The selected time slot for this service is no longer available. Please choose another time or service.']);
        }

        if ($validated['payment_method'] === 'card') {
            $service = Service::find($validated['service_id']);
            Stripe::setApiKey(env('STRIPE_SECRET'));

            try {
                Charge::create([
                    "amount" => $service->price * 100 * $validated['group_size'], // amount in cents
                    "currency" => "zar", // South African Rand
                    "source" => $validated['stripeToken'],
                    "description" => "Payment for " . $service->name,
                ]);
            } catch (\Exception $e) {
                return redirect()->route('booking.create')->withErrors(['payment' => 'Error processing payment: ' . $e->getMessage()]);
            }
        }

        Appointment::create([
            'user_id' => Auth::id(),
            'service_id' => $validated['service_id'],
            'appointment_date' => $dateTime->toDateString(),
            'appointment_time' => $validated['appointment_time'],
            'group_size' => $validated['group_size'],
        ]);

        return redirect()->route('booking.create')->with('success', 'Booking confirmed!');
    }

    // Fetch available and unavailable slots for the selected date and service
    public function getAvailableSlots(Request $request)
    {
        $date = $request->input('date');
        $serviceId = $request->input('service_id');
        $availableSlots = [];
        $unavailableSlots = [];

        $startTime = Carbon::parse($date . ' 09:00');
        $endTime = Carbon::parse($date . ' 17:00');
        $interval = 60; // minutes

        while ($startTime <= $endTime) {
            $slot = $startTime->format('H:i');
            $bookingCount = Appointment::whereDate('appointment_date', $date)
                                        ->where('appointment_time', $slot)
                                        ->where('service_id', $serviceId)
                                        ->sum('group_size');

            if ($bookingCount < 12) {
                $availableSlots[] = $slot;
            } else {
                $unavailableSlots[] = $slot;
            }

            $startTime->addMinutes($interval);
        }

        return response()->json([
            'available' => $availableSlots,
            'unavailable' => $unavailableSlots
        ]);
    }
}

