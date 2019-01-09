<?php

namespace App\Http\Controllers;

use App\Traits\ApiPermission;
use App\Traits\ApiResponser;

/**
 * Class ApiController.
 */
class ApiController extends Controller
{
    use ApiResponser, ApiPermission;

    /**
     * ApiController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }
}
