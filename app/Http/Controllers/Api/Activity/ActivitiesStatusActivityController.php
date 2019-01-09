<?php

namespace App\Http\Controllers\Api\Activity;

use App\ActivitiesStatus;
use App\Activity;
use App\Http\Controllers\ApiController;

class ActivitiesStatusActivityController extends ApiController
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
     * @param \App\ActivitiesStatus $activitiesStatus
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ActivitiesStatus $activitiesStatus)
    {
        $activities = $activitiesStatus->activities;

        return $this->showAll($activities, Activity::class);
    }
}
