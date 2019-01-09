<?php

namespace App\Http\Controllers\Api\Application;

use App\Application;
use App\Http\Controllers\ApiController;
use App\Signature;

class ApplicationSignatureController extends ApiController
{
    /**
     * countryController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    /**
     * @param \App\Application $application
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Application $application)
    {
        $signatures = $application->signatures;

        return $this->showAll($signatures,Signature::class);
    }
}
