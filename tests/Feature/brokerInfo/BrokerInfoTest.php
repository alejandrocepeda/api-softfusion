<?php

namespace Tests\Feature;

use App\BrokerInfo;
use Tests\TestCase;

class BrokerInfoTest extends TestCase
{
    protected $url   = 'api/v1/broker-infos/';
    protected $table = 'broker_infos';

    /**
     * A basic test example.
     */
    public function test_list_broker_info()
    {
        $data     = factory(BrokerInfo::class)->create();
        $response = $this->get($this->url, $this->headers()); //->dump() see uot the code for error
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_show_broker_info()
    {
        $data     = factory(BrokerInfo::class)->create();
        $response = $this->get($this->url.$data->id, $this->headers());
        $response->assertStatus(200);
        $response->assertJson(['data' => $data->toarray()]);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_create_broker_info()
    {
        $data     = factory(BrokerInfo::class)->make();
        $response = $this->post($this->url, $data->toarray(), $this->headers());
        $response->assertStatus(201);
        $response->assertJsonFragment($data->toarray());
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    /* public function test_update_broker_info()
     {
         $old      = factory(BrokerInfo::class)->create();
         $data     = factory(BrokerInfo::class)->make();
         $response = $this->put($this->url.$old->id, $data->toarray(), $this->headers())->dump();
         $response->assertStatus(200);
         $response->assertJsonFragment($data->toarray());
         $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
         $this->assertDatabaseHas($this->table, $data->toarray());
         $this->assertDatabaseMissing($this->table, $old->toarray());
     }*/

    public function test_delete_broker_info()
    {
        $data     = factory(BrokerInfo::class)->create();
        $response = $this->delete($this->url.$data->id, [], $this->headers());
        $response->assertStatus(200);
        $tratamiento = $data->toarray();
        unset($tratamiento['updated_at']);
        $response->assertJson(['data' => $tratamiento]);
        $response->assertJsonStructure(array_keys($tratamiento), $tratamiento);
        $this->assertSoftDeleted($this->table, $tratamiento);
    }
}
