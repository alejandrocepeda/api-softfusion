<?php

namespace App\Http\Controllers\Api\Contact;

use App\Address;
use App\Contact;
use App\Http\Controllers\ApiController;

class ContactAddressController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Contact $contact)
    {
        return $this->showOne($contact->address);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Contact             $contact
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Contact $contact, Address $address)
    {
        $contact->address()->associate($address)->save();

        return $this->successResponse(['data'=>$address, 'message'=>'Attached address']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Contact $contact
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
