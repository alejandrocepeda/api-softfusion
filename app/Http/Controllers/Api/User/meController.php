<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\ApiController;

class meController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->showOne(auth()->user());
    }
}
