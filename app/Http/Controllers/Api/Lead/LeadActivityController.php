<?php

namespace App\Http\Controllers\Api\Lead;

use App\Activity;
use App\Http\Controllers\ApiController;
use App\Lead;

class LeadActivityController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Lead $lead)
    {
        $data = $lead->activities;

        return $this->showAll($data,Activity::class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Lead                $lead
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Lead $lead, Activity $activity)
    {
        $lead->activities()->save($activity);
        $activity->refresh();

        return $this->successResponse(['data' => $activity, 'message' => 'Activity Attach'], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Lead $lead
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lead $lead, Activity $activity)
    {
        $lead->activities()->detach($activity);
        $activity->refresh();

        return $this->successResponse(['data' => $activity, 'message' => 'Activity Detach']);
    }
}
