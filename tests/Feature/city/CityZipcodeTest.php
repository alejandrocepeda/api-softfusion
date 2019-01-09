<?php

namespace Tests\Feature;

use App\Zipcode;
use Tests\TestCase;

class CityZipcodeTest extends TestCase
{
    protected $url   = 'api/v1/cities/';
    protected $table = 'zipcodes';

    /**
     * A basic test example.
     */
    public function test_list_city_zipcodes()
    {
        $data     = factory(Zipcode::class)->create();
        $response = $this->get($this->url.$data->city_id.'/zipcodes', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
