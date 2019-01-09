<?php

namespace App\Http\Controllers\Api\MathOperator;

use App\CommisionRule;
use App\Http\Controllers\ApiController;
use App\MathOperator;

class MathOperatorCommisionRuleController extends ApiController
{
    /**
     * MathOperatorCommisionRuleController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    /**
     * @param \App\MathOperator $mathOperator
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(MathOperator $mathOperator)
    {
        $commisionRules = $mathOperator->commisionRules;

        return $this->showAll($commisionRules,CommisionRule::class);
    }
}
