<?php

namespace App\Http\Controllers\Api\Contact;

use App\Business;
use App\Contact;
use App\Http\Controllers\ApiController;
use App\Http\Resources\BusinessResource;

class ContactBusinessController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Contact $contact)
    {
        $businesses = $contact->business;

        return $this->showOne($businesses);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Contact             $contact
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Contact $contact, Business $business)
    {
        $contact->business()->associate($business)->save();
        $business->refresh();

        return $this->successResponse(['data' => new BusinessResource($business), 'message' => 'Business Attach'], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Contact $contact
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact, Business $business)
    {
        $contact->business()->dissociate($business)->save();
        $contact->refresh();

        return $this->successResponse(['data' => $contact, 'message' => 'Business Detach']);
    }
}
