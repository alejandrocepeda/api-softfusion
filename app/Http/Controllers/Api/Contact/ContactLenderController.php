<?php

namespace App\Http\Controllers\Api\Contact;

use App\Contact;
use App\Http\Controllers\ApiController;
use App\Lead;

class ContactLenderController extends ApiController
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
        $leads = $contact->leads;

        return $this->showAll($leads, Lead::class);
    }
}
