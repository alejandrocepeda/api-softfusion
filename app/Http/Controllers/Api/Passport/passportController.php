<?php

namespace App\Http\Controllers\Api\Passport;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Token;

class passportController extends ApiController
{
    /**
     * passportController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api')->except('login');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $rules = ['email'    => 'required|email',
                  'password' => 'required|string|min:6', ];

        $this->validate($request, $rules);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => true], true)) {
            $request->request->add(['client_id'     => env('PASSWORD_CLIENT_ID'),
                                    'client_secret' => env('PASSWORD_CLIENT_SECRET'),
                                    'grant_type'    => 'password',
                                    'username'      => $request->email,
                                    'password'      => $request->password, ]);

            $response = Route::dispatch($request->create('/oauth/token', 'POST', $request->all()));

            $token = (array) json_decode($response->getContent());

            $token = new Token($token);

            return $this->showOne($token);
        } else {
            return $this->errorResponse('Unauthorized: Access is denied due to invalid credentials.', 401);
        }
    }
}
