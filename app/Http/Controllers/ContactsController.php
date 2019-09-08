<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Resources\Contact as ContactResource;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Contact::class);

        return ContactResource::collection(request()->user()->contacts);

    }
    
    public function store()
    {
        $this->authorize('create', Contact::class);

        // creates a user by using the request user
        // and use the contact relationship to create the user_id automatically for us
        request()->user()->contacts()->create($this->validateData());
    }

    // using route model binding, we can pass in that it's going to be a Contact
    public function show(Contact $contact)
    {
        // authorize an ability, we're authorizing the viewing of this specific contact
        $this->authorize('view', $contact);
        // just passing through the contact resource
        // because these classes are both called Contact, we can use an alias
        return new ContactResource($contact);
    }

    public function update(Contact $contact)
    {
        $this->authorize('update', $contact);
        
        $contact->update($this->validateData());
    }

    public function destroy(Contact $contact)
    {
        $this->authorize('delete', $contact);
        
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
