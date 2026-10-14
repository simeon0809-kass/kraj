<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Services\SecurityLogger;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Visit;
use App\Models\TimeSlot;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke(Request $request)
    {
        return view('front.contact.index');
    }

    public function submit(Request $request)
    {
        $name = $request->input("nameSurname");
        $phone = $request->input("phone");
        $email = $request->input("email");
        $relationship = $request->input("relationship");
        $message = $request->input("message");

        $contact = Contact::create(compact("name", "phone", "email", "relationship", "message"));

        SecurityLogger::log('contact_submitted', $request, 'contact', $contact->id, $email);

        return redirect()->route("contact.index");
    }
}
