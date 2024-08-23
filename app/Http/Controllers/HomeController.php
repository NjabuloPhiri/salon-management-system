<?php

// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        // Fetching services from the database, limit to 3 for example
        $services = Service::take(3)->get();

        // Passing the services data to the home view
        return view('home', compact('services'));
    }
}

