<?php

namespace Tests\Feature;

use App\Business;
use Tests\TestCase;

class BusinessTest extends TestCase
{
    protected $url   = 'api/v1/businesses/';
    protected $table = 'businesses';

    /**
     * A basic test example.
     */
    public function test_list_business()
    {
        $data     = factory(Business::class)->create();
        $response = $this->get($this->url, $this->headers()); //->dump() see uot the code for error
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_show_business()
    {
        $data     = factory(Business::class)->create();
        $response = $this->get($this->url.$data->id, $this->headers());
        $response->assertStatus(200);
        $response->assertJson(['data' => $data->toarray()]);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_create_business()
    {
        $data     = factory(Business::class)->make();
        $response = $this->post($this->url, $data->toarray(), $this->headers());
        $response->assertStatus(201);
        $response->assertJsonFragment($data->toarray());
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_update_business()
    {
        $old      = factory(Business::class)->create();
        $data     = factory(Business::class)->make();
        $response = $this->put($this->url.$old->id, $data->toarray(), $this->headers());
        $response->assertStatus(200);
        $response->assertJsonFragment($data->toarray());
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
        $this->assertDatabaseMissing($this->table, $old->toarray());
    }

    public function test_delete_business()
    {
        $data     = factory(Business::class)->create();
        $response = $this->delete($this->url.$data->id, [], $this->headers());
        $response->assertStatus(200);
        $tratamiento = $data->toarray();
        unset($tratamiento['updated_at']);
        $response->assertJson(['data' => $tratamiento]);
        $response->assertJsonStructure(array_keys($tratamiento), $tratamiento);
        $this->assertSoftDeleted($this->table, $tratamiento);
    }
}
