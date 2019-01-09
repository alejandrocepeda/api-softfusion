<?php

namespace Tests\Feature;

use App\Application;
use Tests\TestCase;

class UserApplicationTest extends TestCase
{
    protected $url   = 'api/v1/users/';
    protected $table = 'applications';

    /**
     * A basic test example.
     */
    public function test_list_user_application()
    {
        $data     = factory(Application::class)->create();
        $response = $this->get($this->url.$data->processor_id.'/applications', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
