<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\CommisionRule;

class DynamicVarCommisionRuleTest extends TestCase
{
    /**
     * A basic test example.
     */
    protected $url   = 'api/v1/dynamic-vars/';
    protected $table = 'commision_rules';

    /**
     * A basic test example.
     */
    public function test_list_dynamic_var_commision_rule()
    {
        $data     = factory(CommisionRule::class)->create();
        $response = $this->get($this->url.$data->dynamic_var_id.'/commision-rules', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
