<?php

namespace App\Http\Controllers\Api\Contact;

use App\Contact;
use App\Http\Controllers\ApiController;
use App\Lead;

class ContactLeadController extends ApiController
{
    /**
     * ContactLeadController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    /**
     * @param Contact $contact
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(contact $contact)
    {
        //
        $contacts = $contact->leads;

        return $this->showAll($contacts,Lead::class);
    }
}
