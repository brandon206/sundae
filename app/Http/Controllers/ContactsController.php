<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        return request()->user()->contacts;
    }
    
    public function store()
    {
        // creates a user by using the request user
        // and use the contact relationship to create the user_id automatically for us
        request()->user()->contacts()->create($this->validateData());
    }

    // using route model binding, we can pass in that it's going to be a Contact
    public function show(Contact $contact)
    {
        // laravel takes care of converting this to json for us
        if(request()->user()->isNot($contact->user)) {
            return response([], 403);
        }
        return $contact;
    }

    public function update(Contact $contact)
    {
        
        if(request()->user()->isNot($contact->user)) {
            return response([], 403);
        }
        
        $contact->update($this->validateData());
    }

    public function destroy(Contact $contact)
    {
        if(request()->user()->isNot($contact->user)) {
            return response([], 403);
        }
        
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
