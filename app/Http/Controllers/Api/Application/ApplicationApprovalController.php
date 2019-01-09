<?php

namespace App\Http\Controllers\Api\Application;

use App\Approval;
use App\Http\Controllers\ApiController;
use App\Application;

class ApplicationApprovalController extends ApiController
{
    /**
     * ApplicationApprovalController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    /**
     * @param \App\Http\Controllers\Api\Approval\Application $application
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Application $application)
    {
        //
        $approvals= $application->approvals;

        return $this->showAll($approvals,Approval::class);
    }
}
