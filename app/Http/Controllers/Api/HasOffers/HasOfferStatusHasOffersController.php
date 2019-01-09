<?php

namespace App\Http\Controllers\Api\HasOffers;

use App\HasOffers;
use App\HasOfferStatus;
use App\Http\Controllers\ApiController;

class HasOfferStatusHasOffersController extends ApiController
{
    /**
     * HasOfferStatusHasOffersController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    /**
     * @param HasOfferStatus $hasOfferStatus
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(HasOfferStatus $hasOfferStatus)
    {
        //
        $hasOffers =$hasOfferStatus->HasOffers;

        return $this->showAll($hasOffers,HasOffers::class);
    }
}
