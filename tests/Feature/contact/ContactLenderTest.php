<?php

namespace Tests\Feature\contact;

use Tests\TestCase;
use App\Lender;

class ContactLenderTest extends TestCase
{
    /**
     * A basic test example.
     */
    protected $url   = 'api/v1/contacts/';
    protected $table = 'lenders';

    /**
     * A basic test example.
     */
    public function test_list_contact_lender()
    {
        $data     = factory(Lender::class)->create();
        $response = $this->get($this->url.$data->contact_id.'/lenders', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
