<?php

namespace Tests\Feature;

use App\Business;
use Tests\TestCase;

class IndustryBusinessTest extends TestCase
{
    /**
     * A basic test example.
     */
    protected $url   = 'api/v1/industries/';
    protected $table = 'Businesses';

    /**
     * A basic test example.
     */
    public function test_list_industry_business()
    {
        $data     = factory(Business::class)->create();
        $response = $this->get($this->url.$data->industry_id.'/businesses', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
