<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Application;

class ProductApplicationTest extends TestCase
{
    /**
     * A basic test example.
     */
    protected $url   = 'api/v1/products/';
    protected $table = 'applications';

    /**
     * A basic test example.
     */
    public function test_list_lender_application()
    {
        $data     = factory(Application::class)->create();
        $response = $this->get($this->url.$data->product_id.'/applications', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
