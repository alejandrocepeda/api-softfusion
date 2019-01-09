<?php

namespace App\Http\Controllers\Api\User;

use App\Lender;
use App\User;
use App\Http\Controllers\ApiController;

/**
 * Class UserLeadController.
 */
class UserLeadController extends ApiController
{
    /**
     * UserLeadController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    /**
     * Display a listing of the resource.
     *
     * @param User $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(User $user)
    {
        $leads= $user->leads;

        return $this->showAll($leads,Lender::class);
    }
}
