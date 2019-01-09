<?php

namespace Tests\Feature;

use App\CommisionRule;
use Tests\TestCase;

class CommisionsTypeCommisionRuleTest extends TestCase
{
    /**
     * A basic test example.
     */
    protected $url   = 'api/v1/commisions-types/';
    protected $table = 'commision_rules';

    /**
     * A basic test example.
     */
    public function test_list_commisions_type_commision_rule()
    {
        $data     = factory(CommisionRule::class)->create();
        $response = $this->get($this->url.$data->commision_type_id.'/commision-rules', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
