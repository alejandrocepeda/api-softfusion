<?php

namespace Tests\Feature;

use App\Lead;
use Tests\TestCase;

class UserLeadTest extends TestCase
{
    /**
     * A basic test example.
     */
    protected $url   = 'api/v1/users/';
    protected $table = 'leads';

    /**
     * A basic test example.
     */
    public function test_list_user_lead()
    {
        $data     = factory(Lead::class)->create();
        $response = $this->get($this->url.$data->executive_id.'/leads', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
