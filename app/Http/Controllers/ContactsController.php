<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'birthday' => 'required',
            'company' => 'required',
        ]);

        Contact::create($data);
    }

    // using route model binding, we can pass in that it's going to be a Contact
    public function show(Contact $contact)
    {
        // laravel takes care of converting this to json for us
        return $contact;
    }
}
