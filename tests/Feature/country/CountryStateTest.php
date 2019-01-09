<?php

namespace Tests\Feature;

use App\State;
use Tests\TestCase;

class CountryStateTest extends TestCase
{
    protected $url   = 'api/v1/countries/';
    protected $table = 'states';

    /**
     * A basic test example.
     */
    public function test_list_country_states()
    {
        $data     = factory(State::class)->create();
        $response = $this->get($this->url.$data->country_id.'/states', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
