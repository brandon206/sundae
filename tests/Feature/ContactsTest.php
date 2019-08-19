<?php
 
namespace Tests\Feature;
 
use App\Contact;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
 
class ContactsTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function a_contact_can_be_added ()
    {
        $this->post('/api/contacts', $this->data());

        $contact = Contact::first();
 
        $this->assertEquals('Test Name', $contact->name);
        $this->assertEquals('test@email.com', $contact->email);
        $this->assertEquals('05/14/1999', $contact->birthday);
        $this->assertEquals('ABC Company', $contact->company);

    }

    /** @test */
    public function fields_are_required()
    {
        collect(['name', 'email', 'birthday', 'company'])
        ->each(function($field){
            $response = $this->post('/api/contacts',
            // using array_merge to merge two arrays, 1st param is the complete set of valid data,
            // 2nd param just has the key of name overwritten to be an empty string to be tested
                array_merge($this->data(), [$field => '']));
    
            $response->assertSessionHasErrors($field);
            $this->assertCount(0, Contact::all());
        });
    }

    private function data()
    {   
        return[
            'name' => 'Test Name',
            'email' => 'test@email.com',
            'birthday' => '05/14/1999',
            'company' => 'ABC Company',
        ];
    }
}