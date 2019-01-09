<?php

namespace App\Http\Controllers\Api\User;

use App\Activity;
use App\User;
use App\Http\Controllers\ApiController;

class UserActivityController extends ApiController
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
     * @param \App\User $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(User $user)
    {
        $activities = $user->activities;

        return $this->showAll($activities,Activity::class);
    }
}
