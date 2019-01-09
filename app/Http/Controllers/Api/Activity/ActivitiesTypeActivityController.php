<?php

namespace App\Http\Controllers\Api\Activity;

use App\ActivitiesType;
use App\Activity;
use App\Http\Controllers\ApiController;

class ActivitiesTypeActivityController extends ApiController
{
    /**
     * countryController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('client.credentials');
    }

    /**
     * @param \App\ActivitiesType $activitiesType
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ActivitiesType $activitiesType)
    {
        $activities = $activitiesType->activities;

        return $this->showAll($activities,Activity::class);
    }
}
