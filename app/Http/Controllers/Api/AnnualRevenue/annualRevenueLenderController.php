<?php

namespace App\Http\Controllers\Api\AnnualRevenue;

use App\AnnualRevenue;
use App\Http\Controllers\ApiController;
use App\Lender;

class annualRevenueLenderController extends ApiController
{
    /**
     * annualRevenueLenderController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\AnnualRevenue $annualRevenue
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(AnnualRevenue $annualRevenue)
    {
        $lenders = $annualRevenue->lenders;

        return $this->showAll($lenders,Lender::class);
    }
}
