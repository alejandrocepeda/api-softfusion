<?php

namespace Tests\Feature\lead;

use App\Application;
use Tests\TestCase;

class LeadApplicationTest extends TestCase
{
    /**
     * A basic test example.
     */
    protected $url   = 'api/v1/leads/';
    protected $table = 'applications';

    /**
     * A basic test example.
     */
    public function test_list_lead_application()
    {
        $data     = factory(Application::class)->create();
        $response = $this->get($this->url.$data->lead_id.'/applications', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
