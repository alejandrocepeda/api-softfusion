<?php

namespace App\Http\Controllers\Api\Application;

use App\Application;
use App\ApplicationStatus;
use App\Http\Controllers\ApiController;

class ApplicationStatusApplicationController extends ApiController
{
    /**
     * ApplicationStatusApplicationController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    /**
     * @param \App\ApplicationStatus $applicationStatus
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ApplicationStatus $applicationStatus)
    {
        $applicacions = $applicationStatus->applications;

        return $this->showAll($applicacions,Application::class);
    }
}
