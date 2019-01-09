<?php

namespace App\Http\Controllers\Api\CommisionRule;

use App\CommisionRule;
use App\Http\Controllers\ApiController;
use App\CommisionsType;

class CommisionsTypeCommisionRuleController extends ApiController
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
    public function index(CommisionsType $commisionsType)
    {
        $commisionRules = $commisionsType->commisionRules;

        return $this->showAll($commisionRules,CommisionRule::class);
    }
}
