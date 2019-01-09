<?php

namespace Tests\Feature;

use App\Contact;
use Tests\TestCase;

class BusinessContactTest extends TestCase
{
    /**
     * A basic test example.
     */
    protected $url   = 'api/v1/businesses/';
    protected $table = 'contacts';

    /**
     * A basic test example.
     */
    public function test_list_business_contact()
    {
        $data     = factory(Contact::class)->create();
        $response = $this->get($this->url.$data->business_id.'/contacts', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
