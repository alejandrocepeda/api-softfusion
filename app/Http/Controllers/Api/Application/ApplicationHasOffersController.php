<?php

namespace App\Http\Controllers\Api\Application;

use App\Application;
use App\HasOffers;
use App\Http\Controllers\ApiController;

class ApplicationHasOffersController extends ApiController
{
    /**
     * ApplicationHasOffersController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    /**
     * @param Application $application
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Application $application)
    {
        //
        $hasOffers = $application->hasOffers;

        return $this->showAll($hasOffers,HasOffers::class);
    }
}
