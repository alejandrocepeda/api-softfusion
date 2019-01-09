<?php

namespace App\Http\Controllers\Api\Application;

use App\Activity;
use App\Application;
use App\Http\Controllers\ApiController;

class ApplicationActivityController extends ApiController
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Application $application)
    {
        $activities=$application->activities;

        return $this->showAll($activities,Activity::class);
    }

    public function update(Application $application, Activity $activity)
    {
        $application->activities()->save($activity);
        $activity->refresh();

        return $this->successResponse(['data' => $activity, 'message' => 'Activity Attach'], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Lead $application
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application, Activity $activity)
    {
        $activity->delete();

        return $this->successResponse(['data' => $activity, 'message' => 'Activity Detach']);
    }
}
