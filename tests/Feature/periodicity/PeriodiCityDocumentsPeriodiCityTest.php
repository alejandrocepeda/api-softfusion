<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\DocumentPeriodicity;

class PeriodiCityDocumentsPeriodiCityTest extends TestCase
{
    /**
     * A basic test example.
     */
    protected $url   = 'api/v1/periodi-cities/';
    protected $table = 'Documents_periodi_cities';

    /**
     * A basic test example.
     */
    public function test_list_periodi_city_Documents_periodi_city()
    {
        $data     = factory(DocumentPeriodicity::class)->create();
        $response = $this->get($this->url.$data->periodicity_id.'/documents-periodi-cities', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
