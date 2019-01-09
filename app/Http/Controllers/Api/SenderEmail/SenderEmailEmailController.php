<?php

namespace App\Http\Controllers\Api\SenderEmail;

use App\Http\Controllers\ApiController;
use App\SenderEmail;

class SenderEmailEmailController extends ApiController
{
    /**
     * countryController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    /**
     * @param \App\SenderEmail $senderEmail
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(SenderEmail $senderEmail)
    {
        //
        $emails = $senderEmail->Emails;

        return $this->showAll($emails,Email::class);
    }
}
