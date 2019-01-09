<?php

namespace App\Http\Controllers\Api\Team;

use App\Activity;
use App\Team;
use App\Http\Controllers\ApiController;

class TeamActivityController extends ApiController
{
    /**
     * Display a listing the team activities.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Team $team)
    {
        $activities = $team->activities;
        
        return $this->showAll($activities,Activity::class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Contact             $contact
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Team $team, Activity $activity)
    {
        $team->activities()->save($activity);
        $activity->refresh();

        return $this->successResponse(['data' => $activity, 'message' => 'Activity Attach'], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Contact $contact
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team, Activity $activity)
    {
        $team->activities()->detach($activity);
        $activity->refresh();

        return $this->successResponse(['data' => $activity, 'message' => 'Activity Detach']);
    }
}
