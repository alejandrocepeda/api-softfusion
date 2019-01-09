<?php

namespace App\Http\Controllers\Api\Business;

use App\Activity;
use App\Business;
use App\Http\Controllers\ApiController;

class BusinessActivityController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Business $business)
    {
        $data = $business->activities;

        return $this->showAll($data,Activity::class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Business            $business
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Business $business, Activity $activity)
    {
        $business->activities()->save($activity);
        $activity->refresh();

        return $this->successResponse(['data' => $activity, 'message' => 'Activity Attach'], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Business $business
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Business $business, Activity $activity)
    {
        $business->activities()->detach($activity);
        $activity->refresh();

        return $this->successResponse(['data' => $activity, 'message' => 'Activity Detach']);
    }
}
