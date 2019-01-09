<?php

namespace App\Http\Controllers\Api\Contact;

use App\Activity;
use App\Contact;
use App\Http\Controllers\ApiController;

class ContactActivityController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Contact $contact)
    {
        $data = $contact->activities;

        return $this->showAll($data,Activity::class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Contact             $contact
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Contact $contact, Activity $activity)
    {
        $contact->activities()->save($activity);
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
    public function destroy(Contact $contact, Activity $activity)
    {
        $contact->activities()->detach($activity);
        $activity->refresh();

        return $this->successResponse(['data' => $activity, 'message' => 'Activity Detach']);
    }
}
