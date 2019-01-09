<?php

namespace App\Http\Controllers\Api\Activity;

use App\Activity;
use App\Email;
use App\Http\Controllers\ApiController;

class ActivityEmailController extends ApiController
{
    /**
     * countryController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('client.credentials');
    }

    /**
     * @param \App\Activity $activity
     *
     * @return mixed
     */
    public function index(Activity $activity)
    {
        $emails = $activity->emails;

        return $this->showAll($emails,Email::class);
    }
}
