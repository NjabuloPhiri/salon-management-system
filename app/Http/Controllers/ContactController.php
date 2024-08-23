<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Send email or store message in the database
        // Mail::to('your-email@example.com')->send(new ContactFormMail($validated));

        return redirect()->route('contact.create')->with('success', 'Thank you for contacting us!');
    }
}
