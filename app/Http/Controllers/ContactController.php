<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function store(Request $request){
        //Validate Contact
        $standard_char_len = 255;
        $request->validate([
            'name'    => 'required|max:'.$standard_char_len,
            'email'   => 'required|email',
            'phone'   => 'nullable|min:11|max:11',
            'subject' => 'required|max:'.$standard_char_len,
            'message' => 'required|max:'.$standard_char_len*4,
        ]);

        //Store Contact
        $contact             = new Contact;
        $contact->name       = $request->name;
        $contact->email      = $request->email;
        $contact->subject    = $request->subject;
        $contact->message    = $request->message;
        $contact->updated_at = null;
        $contact->save();

        return redirect()->route('contact')->with("successful_contact", "Your form was submitted successfully.");
    }
}
