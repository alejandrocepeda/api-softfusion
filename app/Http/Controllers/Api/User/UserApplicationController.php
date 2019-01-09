<?php

namespace App\Http\Controllers\Api\User;

use App\Application;
use App\Http\Controllers\ApiController;
use App\User;

class UserApplicationController extends ApiController
{
    /**
     * UserApplicationController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\User $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(User $user)
    {
        $applications = $user->applications;

        return $this->showAll($applications,Application::class);
    }
}
