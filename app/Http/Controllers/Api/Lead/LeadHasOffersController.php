<?php

namespace App\Http\Controllers\Api\Lead;

use App\HasOffers;
use App\Lead;
use App\Http\Controllers\ApiController;

class LeadHasOffersController extends ApiController
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
        $hasOffers = $lead->hasOffers;

        return $this->showAll($hasOffers,HasOffers::class);
    }
}
