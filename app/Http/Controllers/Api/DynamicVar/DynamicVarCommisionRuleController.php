<?php

namespace App\Http\Controllers\Api\DynamicVar;

use App\CommisionRule;
use App\Http\Controllers\ApiController;
use App\DynamicVar;

class DynamicVarCommisionRuleController extends ApiController
{
    /**
     * CommisionsTypeCommisionRuleController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    /**
     * @param \App\Http\Controllers\Api\CommisionRule\CommisionsType $commisionsType
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(DynamicVar $dynamicVar)
    {
        $commisionRules = $dynamicVar->commisionRules;

        return $this->showAll($commisionRules,CommisionRule::class);
    }
}
