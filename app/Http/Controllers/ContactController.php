<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'fromName' => 'required|string',
            'fromEmail' => 'required|string',
            'emailSubject' => 'required|string',
            'messageContent' => 'required|string',
        ]);
        
        Mail::to('martino-spiroski@hotmail.com')->send(new ContactFormMail($data));

        return back()->with('success', 'Message sent!');
    }
}
