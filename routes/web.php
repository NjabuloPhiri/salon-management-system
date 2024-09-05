<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;


Auth::routes();

// Booking routes with authentication middleware
Route::middleware(['auth'])->group(function () {
    Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking/available-slots', [BookingController::class, 'getAvailableSlots'])->name('booking.available-slots');
});

// Authentication Routes...
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('home');
})->name('home');

// Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

Route::get('/services', function () {
    return view('services.services');
})->name('services');

// Route::get('/services', [ServiceController::class, 'index']);


// Test database with services
// Route::get('/services', [ServiceController::class, 'index']);


// Create route to map to the `getServicesForDropdown()` function in the `ServiceController`
// Route::get('/services', [ServiceController::class, 'getServicesForDropdown']);

Route::post('/book-appointment', [BookingController::class, 'store'])
    ->middleware('auth', 'check.timeslot')
    ->name('book-appointment');




// Authentication routes (login, register, etc.)

// Authentication routes are already included with Laravel's Auth scaffolding.
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('about.about');
})->name('about');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
