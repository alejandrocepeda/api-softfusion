<?php

namespace App\Http\Controllers\Api\Lead;

use App\Application;
use App\Lead;
use App\Http\Controllers\ApiController;

class LeadApplicationController extends ApiController
{
    /**
     * LeadHasOffersController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    /**
     * @param Lead $lead
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Lead $lead)
    {
        //
        $Applications = $lead->Applications;

        return $this->showAll($Applications,Application::class);
    }
}
