<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        // Here you can save to DB OR send email later
        // For now just return success
        return back()->with('success', 'Your message has been sent successfully!');
    }
}
