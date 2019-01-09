<?php

namespace App\Http\Controllers\Api\Application;

use App\Application;
use App\Http\Controllers\ApiController;

class ApplicationCoborrowerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Application $application)
    {
        $coborrower = $application->coborrower;

        return $this->showOne($coborrower);
    }
}
