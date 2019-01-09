<?php

namespace App\Http\Controllers\Api\HasOffers;

use App\HasOffers;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

/**
 * Class HasOffersController.
 */
class HasOffersController extends ApiController
{
    /**
     * HasOffersController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show', 'update', 'store', 'destroy']);
        $this->middleware('client.credentials')->only(['index', 'show', 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $tracking = HasOffers::orderBy('id', 'desc')->get();

        return $this->showAll($tracking,HasOffers::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $rules = ['lead_id'        => 'required',
                  'application_id' => 'required',
                  'transaction_id' => 'required|unique:has_offers,transaction_id',
                  'offer_id'       => 'required',
                  'affiliate_id'   => 'required',
                  'ip'             => 'ip', ];

        $this->validate($request, $rules);

        $data = HasOffers::create($request->all());
	
		return $this->successResponse(['data' => $data, 'message' => 'Offer Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @internal param \App\HasOffers $hasOffersAffiliateTracking
     */
    public function show($id)
    {
        $hasOffersAffiliateTracking = HasOffers::findorfail($id);

        return $this->showOne($hasOffersAffiliateTracking);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param                          $id
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @internal param \App\HasOffers $hasOffersAffiliateTracking
     */
    public function update(Request $request, $id)
    {
        $rules = ['lead_id' => 'required'];

        $this->validate($request, $rules);

        $hasOffersAffiliateTracking = HasOffers::findorfail($id);

        $hasOffersAffiliateTracking->fill($request->all());

        if ($hasOffersAffiliateTracking->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $hasOffersAffiliateTracking->save();

        $transaction_id = $hasOffersAffiliateTracking['transaction_id'];
        $offer_id       = $hasOffersAffiliateTracking['offer_id'];

        if ('form_completed' === $request->input('status')) {
            $hasOffersAffiliateTracking['transaction_postback_1'] = $this->sendPostbackFormCompleted($transaction_id, $offer_id);
        }

        if ('funded_Loan' === $request->input('status')) {
            $amount                                               = $request->input('amount');
            $hasOffersAffiliateTracking['transaction_postback_2'] = $this->sendPostbackFundedLoan($transaction_id, $offer_id, $amount);
        }

        return $this->showOne($hasOffersAffiliateTracking);
    }

    /**
     * @param $transaction_id
     * @param $offer_id
     *
     * @return string
     */
    public function sendPostbackFormCompleted($transaction_id, $offer_id)
    {
        try {
            $client = new \GuzzleHttp\Client();

            $url = 'http://gokapital.go2cloud.org/aff_lsr?offer_id='.$offer_id.'&transaction_id='.$transaction_id;

            $request = $client->get($url);

            // respond = success=true;
            return $request->getBody()->getContents();
        } catch (GuzzleHttp\Exception\BadResponseException $e) {
            $response = $e->getResponse();

            return $response->getBody()->getContents();
        }
    }

    /**
     * @param $transaction_id
     * @param $offer_id
     * @param $amount
     *
     * @return string
     */
    public function sendPostbackFundedLoan($transaction_id, $offer_id, $amount)
    {
        try {
            $client = new \GuzzleHttp\Client();

            $url = 'http://gokapital.go2cloud.org/aff_goal?a=lsr&goal_id='.$offer_id.'&amount='.$amount.'&transaction_id='.$transaction_id;

            $request = $client->get($url);

            // respond = success=true;
            return $request->getBody()->getContents();
        } catch (GuzzleHttp\Exception\BadResponseException $e) {
            $response = $e->getResponse();

            return $response->getBody()->getContents();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\HasOffers $hasOffersAffiliateTracking
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hasOffersAffiliateTracking = HasOffers::findOrFail($id);
        $hasOffersAffiliateTracking->delete();

        return $this->showOne($hasOffersAffiliateTracking);
    }
}
