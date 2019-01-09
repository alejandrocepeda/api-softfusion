<?php

namespace App\Http\Controllers\Api\Email;

use App\Email;
use App\EmailsTemplate;
use App\Http\Controllers\ApiController;

class EmailsTemplateEmailController extends ApiController
{
    /**
     * countryController constructor.
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
    public function index(EmailsTemplate $emailsTemplate)
    {
        //
        $emails = $emailsTemplate->emails;

        return $this->showAll($emails,Email::class);
    }
}
