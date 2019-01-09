<?php

namespace App\Http\Controllers\Api\Contact;

use App\Contact;
use App\Http\Controllers\ApiController;

class CoborrowerApplicationController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $contact      = Contact::findOrFail($id);
        $applications = $contact->coborrower_applications;

        return $this->showOne($applications,Contact::class);
    }
}
