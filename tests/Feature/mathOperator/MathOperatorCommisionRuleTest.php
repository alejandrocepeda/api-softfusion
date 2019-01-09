<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\CommisionRule;

class MathOperatorCommisionRuleTest extends TestCase
{
    /**
     * A basic test example.
     */
    protected $url   = 'api/v1/math-operators/';
    protected $table = 'commision_rules';

    /**
     * A basic test example.
     */
    public function test_list_math_operator_commision_rule()
    {
        $data     = factory(CommisionRule::class)->create();
        $response = $this->get($this->url.$data->math_operator_id.'/commision-rules', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
