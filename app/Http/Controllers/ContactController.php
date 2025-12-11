<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function index() {
        return view('home.contact');
    }

    public function send(Request $request) {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        // Send email to admin
        try {
            Mail::to('santroz260@gmail.com')->send(
                new ContactFormMail(
                    $request->name,
                    $request->email,
                    $request->message
                )
            );

            return back()->with('success', 'Your message has been sent successfully! We will get back to you soon.');
        } catch (\Exception $e) {
            return back()->with('error', 'Sorry, there was an error sending your message. Please try again later.');
        }
    }
}
