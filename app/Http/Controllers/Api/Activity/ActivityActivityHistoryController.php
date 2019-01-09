<?php

namespace App\Http\Controllers\Api\Activity;

use App\ActivitiesHistory;
use App\Activity;
use App\Http\Controllers\ApiController;

class ActivityActivityHistoryController extends ApiController
{
    /**
     * countryController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth:api')->except(['index']);
        $this->middleware('client.credentials');
    }

    /**
     * @param \App\Activity $activity
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Activity $activity)
    {
        $activityHistories = $activity->activitiesHistories;

        return $this->showAll($activityHistories,ActivitiesHistory::class);
    }
}
