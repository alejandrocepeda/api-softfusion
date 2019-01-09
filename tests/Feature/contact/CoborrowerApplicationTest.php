<?php

namespace Tests\Feature\contact;

use App\Application;
use Tests\TestCase;

class CoborrowerApplicationTest extends TestCase
{
    /**
     * A basic test example.
     */
    protected $url   = 'api/v1/coborrowers/';
    protected $table = 'applications';

    /**
     * A basic test example.
     */
    public function test_list_coborrower_application()
    {
        $data     = factory(Application::class)->create();
        $response = $this->get($this->url.$data->coborrower_id.'/applications', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
