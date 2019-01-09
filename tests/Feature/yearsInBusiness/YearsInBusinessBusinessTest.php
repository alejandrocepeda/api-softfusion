<?php

namespace Tests\Feature;

use App\Business;
use Tests\TestCase;

class YearsInBusinessBusinessTest extends TestCase
{
    protected $url   = 'api/v1/years-in-business/';
    protected $table = 'businesses';

    /**
     * A basic test example.
     */
    public function test_list_contact_user()
    {
        $data     = factory(Business::class)->create();
        $response = $this->get($this->url.$data->years_in_business_id.'/businesses', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
