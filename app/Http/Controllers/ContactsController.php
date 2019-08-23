<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function store()
    {
        Contact::create($this->validateData());
    }

    // using route model binding, we can pass in that it's going to be a Contact
    public function show(Contact $contact)
    {
        // laravel takes care of converting this to json for us
        return $contact;
    }

    public function update(Contact $contact)
    {
        
        $contact->update($this->validateData());
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
    }

    private function validateData()
    {
        return request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'birthday' => 'required',
            'company' => 'required',
        ]);
    }
}
