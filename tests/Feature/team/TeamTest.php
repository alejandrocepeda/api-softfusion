<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Team;

class TeamTest extends TestCase
{
    protected $url   = 'api/v1/teams/';
    protected $table = 'Teams';

    /**
     * A basic test example.
     */
    public function test_list_teamy()
    {
        $data     = factory(Team::class)->create();
        $response = $this->get($this->url, $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_show_teamy()
    {
        $data     = factory(Team::class)->create();
        $response = $this->get($this->url.$data->id, $this->headers());
        $response->assertStatus(200);
        $response->assertJson(['data' => $data->toarray()]);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_create_teamy()
    {
        $data     = factory(Team::class)->make();
        $response = $this->post($this->url, $data->toarray(), $this->headers());
        $response->assertStatus(201);
        $response->assertJsonFragment($data->toarray());
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_update_teamy()
    {
        $old      = factory(Team::class)->create();
        $data     = factory(Team::class)->make();
        $response = $this->put($this->url.$old->id, $data->toarray(), $this->headers());
        $response->assertStatus(200);
        $response->assertJsonFragment($data->toarray());
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
        $this->assertDatabaseMissing($this->table, $old->toarray());
    }

    public function test_delete_teamy()
    {
        $data     = factory(Team::class)->create();
        $response = $this->delete($this->url.$data->id, [], $this->headers());
        $response->assertStatus(200);
        $tratamiento = $data->toarray();
        unset($tratamiento['updated_at']);
        $response->assertJson(['data'=>$tratamiento]);
        $response->assertJsonStructure(array_keys($tratamiento), $tratamiento);
        $this->assertSoftDeleted($this->table, $tratamiento);
    }
}