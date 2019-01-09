<?php

namespace App\Http\Controllers\Api\Address;

use App\Address;
use App\Business;
use App\Http\Controllers\ApiController;

class AddressBusinessController extends ApiController
{
    /**
     * AddressBusinessController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    /**
     * @param Address $address
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Address $address)
    {
        $business = $address->businesses;

        return $this->showAll($business,Business::class);
    }
}
