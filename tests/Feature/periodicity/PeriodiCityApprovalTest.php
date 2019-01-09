<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Approval;

class PeriodiCityApprovalTest extends TestCase
{
    /**
     * A basic test example.
     */
    protected $url   = 'api/v1/periodi-cities/';
    protected $table = 'Approvals';

    /**
     * A basic test example.
     */
    public function test_list_periodi_city_approval()
    {
        $data     = factory(Approval::class)->create();
        $response = $this->get($this->url.$data->periodicity_id.'/approvals', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
