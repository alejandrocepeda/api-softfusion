<?php

namespace App\Http\Controllers\Api\Lender;

use App\Approval;
use App\Lender;
use App\Http\Controllers\ApiController;

class LenderApprovalController extends ApiController
{
    /**
     * LeadHasOffersController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    /**
     * @param \App\Lender $lender
     *
     * @return mixed
     */
    public function index(Lender $lender)
    {
        //
        $approvals= $lender->approvals;

        return $this->showAll($approvals,Approval::class);
    }
}
