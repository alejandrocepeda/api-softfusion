<?php

namespace App\Http\Controllers\Api\AnnualRevenue;

use App\AnnualRevenue;
use App\Business;
use App\Http\Controllers\ApiController;

class AnnualRevenueBusinessController extends ApiController
{
    /**
     * AnnualRevenueBusinessController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(annualRevenue $annualRevenue)
    {
        $businesses = $annualRevenue->businesses;

        return $this->showAll($businesses,Business::class);
    }
}
