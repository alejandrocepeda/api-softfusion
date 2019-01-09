<?php

namespace App\Http\Controllers\Api\Industry;

use App\Business;
use App\Industry;
use App\Http\Controllers\ApiController;

class IndustryBusinessController extends ApiController
{
    /**
     * IndustryBusinessController constructor.
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
    public function index(industry $industry)
    {
        $businesses = $industry->businesses;

        return $this->showAll($businesses,Business::class);
    }
}
