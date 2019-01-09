<?php

namespace App\Http\Controllers\Api\Periodicity;

use App\Approval;
use App\Http\Controllers\ApiController;
use App\Periodicity;

class PeriodicityApprovalController extends ApiController
{
    /**
     * PeriodicityApprovalController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    /**
     * @param \App\Http\Controllers\Api\Periodicity\Approval $periodiCity
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Periodicity $periodiCity)
    {
        //
        $approvals= $periodiCity->approvals;

        return $this->showAll($approvals,Approval::class);
    }
}
