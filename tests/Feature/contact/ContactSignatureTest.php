<?php

namespace Tests\Feature;

use App\Signature;
use Tests\TestCase;

class ContactSignatureTest extends TestCase
{
    /**
     * A basic test example.
     */
    protected $url   = 'api/v1/contacts/';
    protected $table = 'signatures';

    /**
     * A basic test example.
     */
    public function test_list_contact_signature()
    {
        $data     = factory(Signature::class)->create();
        /* print_r($this->url.$data->contact_id.'/applications');
        exit;*/
        $response = $this->get($this->url.$data->contact_id.'/signatures', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
