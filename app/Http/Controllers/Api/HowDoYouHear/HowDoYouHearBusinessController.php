<?php

namespace App\Http\Controllers\Api\HowDoYouHear;

use App\Business;
use App\HowDoYouHear;
use App\Http\Controllers\ApiController;

class HowDoYouHearBusinessController extends ApiController
{
    /**
     * HowDoYouHearBusinessController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(howDoYouHear $howDoYouHear)
    {
        $businesses = $howDoYouHear->businesses;

        return $this->showAll($businesses,Business::class);
    }
}
