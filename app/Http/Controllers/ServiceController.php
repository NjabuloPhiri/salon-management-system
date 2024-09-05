<?php

// app/Http/Controllers/ServiceController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service; // Assuming you have a Service model

class ServiceController extends Controller
{
   public function index()
   {
    $services = Service::all();
    return view('services', compact('services'));
   }
}
