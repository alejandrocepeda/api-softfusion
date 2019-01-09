<?php

namespace App\Http\Controllers\Api\LoanPurpose;

use App\Application;
use App\Http\Controllers\ApiController;
use App\LoanPurpose;

class LoanPurposeApplicationController extends ApiController
{
    /**
     * LoanPurposeApplicationController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\LoanPurpose $loanPurpose
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(LoanPurpose $loanPurpose)
    {
        $applications = $loanPurpose->applications;

        return $this->showAll($applications,Application::class);
    }
}
