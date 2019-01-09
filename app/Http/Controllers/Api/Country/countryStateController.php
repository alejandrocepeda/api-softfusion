<?php

namespace App\Http\Controllers\Api\Country;

use App\Country;
use App\Http\Controllers\ApiController;

/**
 * Class countryStateController.
 */
class countryStateController extends ApiController
{
    /**
     * countryStateController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\Country $country
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Country $country)
    {
        $states = $country->states;

        return $this->showAll($states,State::class);
    }
}
