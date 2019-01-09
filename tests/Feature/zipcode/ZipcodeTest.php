<?php

namespace Tests\Feature;

use App\Zipcode;
use Tests\TestCase;

/**
 * Class ZipcodeTest.
 */
class ZipcodeTest extends TestCase
{
    protected $url   = 'api/v1/zipcodes/';
    protected $table = 'zipcodes';

    /**
     * A basic test example.
     */
    public function test_list_zipcode()
    {
        $data     = factory(Zipcode::class)->create();
        $response = $this->get($this->url, $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_show_zipcode()
    {
        $data     = factory(Zipcode::class)->create();
        $response = $this->get($this->url.$data->id, $this->headers());
        $response->assertStatus(200);
        //$response->assertJson(['data' => $data->toarray()]);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_create_zipcode()
    {
        $data     = factory(Zipcode::class)->make();
        $response = $this->post($this->url, $data->toarray(), $this->headers());
        $response->assertStatus(201);
        //$response->assertJsonFragment($data->toarray());
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_update_zipcode()
    {
        $old      = factory(Zipcode::class)->create();
        $data     = factory(Zipcode::class)->make();
        $response = $this->put($this->url.$old->id, $data->toarray(), $this->headers());
        $response->assertStatus(200);
        //$response->assertJsonFragment($data->toarray());
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
        $this->assertDatabaseMissing($this->table, $old->toarray());
    }

    public function test_update_empty()
    {
        $data      = factory(Zipcode::class)->create();
        $response  = $this->put($this->url.$data->id, [], $this->headers());
        $response->assertStatus(422);
    }

    public function test_delete_zipcode()
    {
        $data     = factory(Zipcode::class)->create();
        $response = $this->delete($this->url.$data->id, [], $this->headers());
        $response->assertStatus(200);
        //$response->assertJson(['data' => $data->toarray()]);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertSoftDeleted($this->table, $data->toarray());
    }
}
