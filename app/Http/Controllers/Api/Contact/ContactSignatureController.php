<?php

namespace App\Http\Controllers\Api\Contact;

use App\Contact;
use App\Http\Controllers\ApiController;
use App\Signature;

class ContactSignatureController extends ApiController
{
    /**
     * countryController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    public function index(contact $contact)
    {
        //
        $signatures = $contact->signatures;

        return $this->showAll($signatures,Signature::class);
    }
}
