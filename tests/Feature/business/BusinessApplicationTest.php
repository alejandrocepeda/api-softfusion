<?php

namespace Tests\Feature\business;

use App\Application;
use Tests\TestCase;

class BusinessApplicationTest extends TestCase
{
    /**
     * A basic test example.
     */
    protected $url   = 'api/v1/businesses/';
    protected $table = 'applications';

    /**
     * A basic test example.
     */
    public function test_list_business_contact()
    {
        $data     = factory(Application::class)->create();
        $response = $this->get($this->url.$data->business_id.'/applications', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
