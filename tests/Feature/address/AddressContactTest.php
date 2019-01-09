<?php

namespace Tests\Feature;

use App\Contact;
use Tests\TestCase;

class AddressContactTest extends TestCase
{
    /**
     * A basic test example.
     */
    protected $url   = 'api/v1/addresses/';
    protected $table = 'contacts';

    /**
     * A basic test example.
     */
    public function test_list_address_contact()
    {
        $data     = factory(Contact::class)->create();
        $response = $this->get($this->url.$data->address_id.'/contacts', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
