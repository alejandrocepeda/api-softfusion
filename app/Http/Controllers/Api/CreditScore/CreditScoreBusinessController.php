<?php

namespace App\Http\Controllers\Api\CreditScore;

use App\Business;
use App\CreditScore;
use App\Http\Controllers\ApiController;

class CreditScoreBusinessController extends ApiController
{
    /**
     * CreditScoreBusinessController constructor.
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
    public function index(CreditScore $creditScore)
    {
        $businesses = $creditScore->businesses;

        return $this->showAll($businesses,Business::class);
    }
}
