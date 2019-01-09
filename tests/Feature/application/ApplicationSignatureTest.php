<?php

namespace Tests\Feature;

use App\Signature;
use Tests\TestCase;

class ApplicationSignatureTest extends TestCase
{
    /**
     * A basic test example.
     */
    protected $url   = 'api/v1/applications/';
    protected $table = 'signatures';

    /**
     * A basic test example.
     */
    public function test_list_application_signature()
    {
        $data     = factory(Signature::class)->create();
        $response = $this->get($this->url.$data->application_id.'/signatures', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
