<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        //$this->middleware('auth:api');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.index');
    }

    public function leads()
    {
        return view('app.leads');
    }

    public function leadshow()
    {
        return view('app.showlead');
    }

    public function showdeal()
    {
        return view('app.showdeal');
    }

    public function showcontact()
    {
        return view('app.showcontact');
    }

    public function showbusiness()
    {
        return view('app.showbusiness');
    }

    public function showlender()
    {
        return view('app.showlender');
    }

    public function showbroker()
    {
        return view('app.showbroker');
    }

    public function calculators()
    {
        return view('app.calculators');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getTokens()
    {
        return view('home.personal-tokens');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getClients()
    {
        return view('home.personal-clients');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAuthorizedClients()
    {
        return view('home.authorized-clients');
    }
}
