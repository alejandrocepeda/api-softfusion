<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\DocumentPeriodicity;

class Test extends TestCase
{
    protected $url   = 'api/v1/documents-periodi-cities/';
    protected $table = 'documents_periodi_cities';

    /**
     * A basic test example.
     */
    public function test_list_document_periodi_city()
    {
        $data     = factory(DocumentPeriodicity::class)->create();
        $response = $this->get($this->url, $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_list_document_periodi_city_role_admin()
    {
        $data     = factory(DocumentPeriodicity::class)->create();
        $response = $this->get($this->url, $this->admin());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_show_document_periodi_city()
    {
        $data     = factory(DocumentPeriodicity::class)->create();
        $response = $this->get($this->url.$data->id, $this->headers());
        $response->assertStatus(200);
        $response->assertJson(['data' => $data->toarray()]);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_create_document_periodi_city()
    {
        $data     = factory(DocumentPeriodicity::class)->make();
        $response = $this->post($this->url, $data->toarray(), $this->headers());
        $response->assertStatus(201);
        $response->assertJsonFragment($data->toarray());
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_update_document_periodi_city()
    {
        $old      = factory(DocumentPeriodicity::class)->create();
        $data     = factory(DocumentPeriodicity::class)->make();
        $response = $this->put($this->url.$old->id, $data->toarray(), $this->headers());
        $response->assertStatus(200);
        $response->assertJsonFragment($data->toarray());
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
        $this->assertDatabaseMissing($this->table, $old->toarray());
    }

    public function test_delete_document_periodi_city()
    {
        $data     = factory(DocumentPeriodicity::class)->create();
        $response = $this->delete($this->url.$data->id, [], $this->headers());
        $response->assertStatus(200);
        $tratamiento = $data->toarray();
        unset($tratamiento['updated_at']);
        $response->assertJson(['data'=>$tratamiento]);
        $response->assertJsonStructure(array_keys($tratamiento), $tratamiento);
        $this->assertSoftDeleted($this->table, $tratamiento);
    }
}
