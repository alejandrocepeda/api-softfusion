<?php

namespace App\Http\Controllers\Api\Business;

use App\Business;
use App\Contact;
use App\Http\Controllers\ApiController;

class BusinessContactController extends ApiController
{
    /**
     * BusinessContactController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    /**
     * @param Business $business
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(business $business)
    {
        //
        $contacts =$business->contacts;

		return $this->showAll($contacts,Contact::class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Business            $business
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Business $business, Contact $contact)
    {
        $business->contacts()->save($contact);
        $contact->refresh();

        return $this->successResponse(['data' => $contact, 'message' => 'Contact Attach'], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Business $business
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Business $business, Contact $contact)
    {
        $business->contacts()->detach($contact);
        $contact->refresh();

        return $this->successResponse(['data' => $contact, 'message' => 'Contact Detach']);
    }
}
