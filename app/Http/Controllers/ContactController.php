<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactInquiry;
use App\Services\VisitorTracker;

class ContactController extends Controller
{
    /**
     * Show Contact Page
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Submit Contact Form
     */
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:30',
            'company' => 'nullable|string|max:150',
            'service' => 'nullable|string|max:100',
            'budget' => 'nullable|string|max:100',
            'message' => 'required|string|max:3000',
        ]);

        $ip = VisitorTracker::getClientIp($request);

        ContactInquiry::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'company' => $validated['company'] ?? null,
            'service' => $validated['service'] ?? null,
            'budget' => $validated['budget'] ?? null,
            'message' => $validated['message'],
            'ip_address' => $ip,
            'status' => 'unread',
        ]);

        return redirect()->back()->with('success_message', 'Thank you! Your message has been sent successfully. Our team will review your inquiry and get in touch within 24 hours.');
    }
}
