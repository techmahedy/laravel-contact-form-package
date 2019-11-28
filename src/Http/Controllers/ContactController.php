<?php

namespace Codechief\Contact\Http\Controllers;

use App\Http\Controllers\Controller;
use Codechief\Contact\Mail\UserMail;
use Codechief\Contact\Mail\ContactMail;
use Codechief\Contact\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * return view
     */
    public function index()
    {
        return view("contact::contact");
    }

    /**
     * Store data and send email to admin
     */
    public function store(Request $request)
    {
        
        \Mail::to(config('contact.send_email_to'))->send(new ContactMail($request->message, $request->name));

        if($request->status == 1){

          \Mail::to($request->email)->send(new UserMail($request->message, $request->name));
        }

        Contact::create([
          
          'name' => $request->name,
          'email' => $request->email,
          'subject' => $request->subject,
          'message' => $request->message
        
        ]);

        return response()->json([
           "status" => "Message sent successfully"
        ]);
    }
}
