<?php

namespace App\Http\Controllers\Api\Activity;

use App\ActivitiesHistory;
use App\ActivitiesStatus;
use App\Http\Controllers\ApiController;

class ActivitiesStatusActivityHistoryController extends ApiController
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
     * @param \App\Activity $activity
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ActivitiesStatus $activitiesStatus)
    {
        $activityHistories = $activitiesStatus->activitiesHistories;

        return $this->showAll($activityHistories,ActivitiesHistory::class);
    }
}
