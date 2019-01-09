<?php

namespace App\Http\Controllers\Api\Business;

use App\Application;
use App\Business;
use App\Http\Controllers\ApiController;

class BusinessApplicationController extends ApiController
{
    /**
     * BusinessContactController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    /**
     * @param Business $business
     *

     * @return \Illuminate\Http\JsonResponse
     */
    public function index(business $business)
    {
        //
        $applications =$business->applications;

        return $this->showAll($applications,Application::class);
    }
}
