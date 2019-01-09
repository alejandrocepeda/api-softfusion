<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ApiController;
use App\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

/**
 * Class ForgotPasswordController.
 */
class ForgotPasswordController extends ApiController
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getResetPassword(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

        $user = User::where('email', $request->input('email'))->first();
        if (!$user) {
            return $this->errorResponse(trans('passwords.user'), 404);
        }

        $response = $this->broker()->sendResetLink($request->only('email'));

        return $this->showOne(['message' => trans($response)], 201);
    }
}
