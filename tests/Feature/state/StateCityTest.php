<?php

namespace Tests\Feature;

use App\City;
use Tests\TestCase;

class StateCityTest extends TestCase
{
    protected $url   = 'api/v1/states/';
    protected $table = 'cities';

    /**
     * A basic test example.
     */
    public function test_list_state_city()
    {
        $data     = factory(City::class)->create();
        $response = $this->get($this->url.$data->state_id.'/cities', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
