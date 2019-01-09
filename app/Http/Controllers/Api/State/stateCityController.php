<?php

namespace App\Http\Controllers\Api\State;

use App\Http\Controllers\ApiController;
use App\State;

/**
 * Class stateCityController.
 */
class stateCityController extends ApiController
{
    /**
     * stateCityController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\State $state
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(State $state)
    {
        $cities = $state->cities;

        return $this->showAll($cities,Citie::class);
    }
}
