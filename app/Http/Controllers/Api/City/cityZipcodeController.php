<?php

namespace App\Http\Controllers\Api\City;

use App\city;
use App\Http\Controllers\ApiController;
use App\Zipcode;

/**
 * Class cityZipcodeController.
 */
class cityZipcodeController extends ApiController
{
    /**
     * cityZipcodeController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\city $city
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(City $city)
    {
        $zipcode = $city->zipcode;

        return $this->showAll($zipcode,Zipcode::class);
    }
}
