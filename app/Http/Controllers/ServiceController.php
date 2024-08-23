<?php

// app/Http/Controllers/ServiceController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service; // Assuming you have a Service model

class ServiceController extends Controller
{
    public function index()
    {
        // Fetching services from the database
        $services = Service::all();

        // Passing the services data to the view
        return view('services.index', compact('services'));
    }
}
