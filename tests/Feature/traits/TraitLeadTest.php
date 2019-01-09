<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Lead;

class TraitLeadTest extends TestCase
{
    protected $url   = 'api/v1/leads/';
    protected $table = 'leads';

    /**
     * A basic test example.
     */
    public function test_list_lead_trait()
    {
        $data     = factory(Lead::class)->create();
        $response = $this->get($this->url, $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
