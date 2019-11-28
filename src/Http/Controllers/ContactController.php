<?php

namespace Codechief\Contact\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Codechief\Contact\Models\Contact;
use Codechief\Contact\Mail\ContactMail;

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
        Contact::create($request->all());
        return redirect(route('contact'));
    }
}
