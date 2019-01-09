<?php

namespace Tests\Feature;

use App\ActivitiesHistory;
use Tests\TestCase;

class ActivitiesHistoryTest extends TestCase
{
    protected $url   = 'api/v1/activities-histories/';
    protected $table = 'activities_histories';

    /**
     * A basic test example.
     */
    public function test_list_activities_history()
    {
        $data     = factory(ActivitiesHistory::class)->create();
        $response = $this->get($this->url, $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_show_activities_history()
    {
        $data     = factory(ActivitiesHistory::class)->create();
        $response = $this->get($this->url.$data->id, $this->headers());
        $response->assertStatus(200);
        $response->assertJson(['data'=>$data->toarray()]);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_create_activities_history()
    {
        $data     = factory(ActivitiesHistory::class)->make();
        $response = $this->post($this->url, $data->toarray(), $this->headers());
        $response->assertStatus(201);
        $response->assertJsonFragment($data->toarray());
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_update_activities_history()
    {
        $old      = factory(ActivitiesHistory::class)->create();
        $data     = factory(ActivitiesHistory::class)->make();
        $response = $this->put($this->url.$old->id, $data->toarray(), $this->headers());
        $response->assertStatus(200);
        $response->assertJsonFragment($data->toarray());
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
        $this->assertDatabaseMissing($this->table, $old->toarray());
    }

    public function test_delete_activities_history()
    {
        $data     = factory(ActivitiesHistory::class)->create();
        $response = $this->delete($this->url.$data->id, [], $this->headers());
        $response->assertStatus(200);
        $tratamiento = $data->toarray();
        unset($tratamiento['updated_at']);
        $response->assertJson(['data'=>$tratamiento]);
        $response->assertJsonStructure(array_keys($tratamiento), $tratamiento);
        $this->assertSoftDeleted($this->table, $tratamiento);
    }
}
