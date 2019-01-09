<?php

namespace Tests\Feature;

use App\Application;
use Tests\TestCase;

class LoanPurposeApplicationTest extends TestCase
{
    protected $url   = 'api/v1/loan-purposes/';
    protected $table = 'applications';

    /**
     * A basic test example.
     */
    public function test_list_loan_purpose_application()
    {
        $data     = factory(Application::class)->create();
        $response = $this->get($this->url.$data->loan_purpose_id.'/applications', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
