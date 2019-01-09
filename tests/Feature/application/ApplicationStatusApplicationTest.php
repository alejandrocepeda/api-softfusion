<?php

namespace Tests\Feature;

use App\Application;
use Tests\TestCase;

class ApplicationStatusApplicationTest extends TestCase
{
    /**
     * A basic test example.
     */
    protected $url   = 'api/v1/application-statuses/';
    protected $table = 'applications';

    /**
     * A basic test example.
     */
    public function test_list_application_status_application()
    {
        $data     = factory(Application::class)->create();
        /* print_r($this->url.$data->application_status_id.'/applications');
        exit;*/
        $response = $this->get($this->url.$data->application_status_id.'/applications', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
