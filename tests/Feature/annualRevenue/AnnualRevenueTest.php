<?php

namespace Tests\Feature;

use App\AnnualRevenue;
use Tests\TestCase;

/**
 * Class AnnualRevenueTest.
 */
class AnnualRevenueTest extends TestCase
{
    protected $url   = 'api/v1/annual-revenues/';
    protected $table = 'annual_revenues';

    /**
     * A basic test example.
     */
    public function test_list_AnnualRevenue()
    {
        $data     = factory(AnnualRevenue::class)->create();
        $response = $this->get($this->url, $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_show_AnnualRevenue()
    {
        $data     = factory(AnnualRevenue::class)->create();
        $response = $this->get($this->url.$data->id, $this->headers());
        $response->assertStatus(200);
        $response->assertJson(['data'=>$data->toarray()]);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_create_AnnualRevenue()
    {
        $data     = factory(AnnualRevenue::class)->make();
        $response = $this->post($this->url, $data->toarray(), $this->headers());
        $response->assertStatus(201);
        $response->assertJsonFragment($data->toarray());
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_update_AnnualRevenue()
    {
        $old      = factory(AnnualRevenue::class)->create();
        $data     = factory(AnnualRevenue::class)->make();
        $response = $this->put($this->url.$old->id, $data->toarray(), $this->headers());
        $response->assertStatus(200);
        $response->assertJsonFragment($data->toarray());
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
        $this->assertDatabaseMissing($this->table, $old->toarray());
    }

    public function test_update_empty()
    {
        $data      = factory(AnnualRevenue::class)->create();
        $response  = $this->put($this->url.$data->id, [], $this->headers());
        $response->assertStatus(422);
    }

    public function test_delete_AnnualRevenue()
    {
        $data     = factory(AnnualRevenue::class)->create();
        $response = $this->delete($this->url.$data->id, [], $this->headers());
        $response->assertStatus(200);
        $response->assertJson(['data'=>$data->toarray()]);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertSoftDeleted($this->table, $data->toarray());
    }
}
