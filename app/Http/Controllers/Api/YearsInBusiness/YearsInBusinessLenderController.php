<?php

namespace App\Http\Controllers\Api\YearsInBusiness;

use App\Lender;
use App\YearsInBusiness;
use App\Http\Controllers\ApiController;

class YearsInBusinessLenderController extends ApiController
{
    /**
     * YearsInBusinessLenderController constructor.
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
        $lenders = $yesInBusiness->lenders;

        return $this->showAll($lenders,Lender::class);
    }
}
