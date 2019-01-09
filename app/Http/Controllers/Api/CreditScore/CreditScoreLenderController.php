<?php

namespace App\Http\Controllers\Api\CreditScore;

use App\CreditScore;
use App\Http\Controllers\ApiController;
use App\Lender;

class CreditScoreLenderController extends ApiController
{
    /**
     * CreditScoreLenderController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\CreditScore $creditScore
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(CreditScore $creditScore)
    {
        $lenders = $creditScore->lenders;

        return $this->showAll($lenders,Lender::class);
    }
}
