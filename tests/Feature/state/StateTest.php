<?php

namespace Tests\Feature;

use App\Country;
use App\State;
use Tests\TestCase;

/**
 * Class StateTest.
 */
class StateTest extends TestCase
{
    protected $url   = 'api/v1/states/';
    protected $table = 'states';

    /**
     * A basic test example.
     */
    public function test_list_state()
    {
        $data     = factory(State::class)->create();
        $response = $this->get($this->url, $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_show_state()
    {
        $data     = factory(State::class)->create();
        $response = $this->get($this->url.$data->id, $this->headers());
        $response->assertStatus(200);
        $response->assertJson(['data'=>$data->toarray()]);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_create_state()
    {
        $data     = factory(State::class)->make();
        $response = $this->post($this->url, $data->toarray(), $this->headers());
        $response->assertStatus(201);
        $response->assertJsonFragment($data->toarray());
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_update_state()
    {
        $old      = factory(State::class)->create();
        $data     = factory(State::class)->make();
        $response = $this->put($this->url.$old->id, $data->toarray(), $this->headers());
        $response->assertStatus(200);
        $response->assertJsonFragment($data->toarray());
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
        $this->assertDatabaseMissing($this->table, $old->toarray());
    }

    public function test_update_empty()
    {
        $data      = factory(State::class)->create();
        $response  = $this->put($this->url.$data->id, [], $this->headers());
        $response->assertStatus(422);
    }

    public function test_delete_state()
    {
        $data     = factory(State::class)->create();
        $response = $this->delete($this->url.$data->id, [], $this->headers());
        $response->assertStatus(200);
        $response->assertJson(['data'=>$data->toarray()]);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertSoftDeleted($this->table, $data->toarray());
    }

    public function test_state_cities()
    {
        $country  = Country::inRandomOrder()->first();
        $data     = factory(State::class)->make();
        $response = $this->get('api/v1/countries/'.$country->id.'/states', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
    }
}
