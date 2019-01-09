<?php

namespace App\Http\Controllers\Api\YearsInBusiness;

use App\Business;
use App\YearsInBusiness;
use App\Http\Controllers\ApiController;

class YearsInBusinessBusinessController extends ApiController
{
    /**
     * YearsInBusinessBusinessController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    /**
     * @param YearsInBusiness $yesInBusiness
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(YearsInBusiness $yesInBusiness)
    {
        $business = $yesInBusiness->businesses;

        return $this->showAll($business,Business::class);
    }
}
