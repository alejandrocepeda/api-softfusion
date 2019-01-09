<?php

namespace App\Http\Controllers\Api\Business;

use App\Address;
use App\Business;
use App\Http\Controllers\ApiController;

class BusinessAddressController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Business $business)
    {
        return $this->showOne($business->address);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Contact             $contact
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Business $business, Address $address)
    {
        $business->address()->associate($address)->save();

        return $this->showOne($business);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Contact $contact
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Business $business)
    {
        //
    }
}
