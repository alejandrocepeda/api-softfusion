<?php

namespace App\Http\Controllers\Api\Address;

use App\Address;
use App\Contact;
use App\Http\Controllers\ApiController;

class AddressContactController extends ApiController
{
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
        //
        $contacts = $address->contacts;

        return $this->showAll($contacts,Contact::class);
    }
}
