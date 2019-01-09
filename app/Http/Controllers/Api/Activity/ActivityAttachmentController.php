<?php

namespace App\Http\Controllers\Api\Activity;

use App\Activity;
use App\Attachment;
use App\Http\Controllers\ApiController;

class ActivityAttachmentController extends ApiController
{
    /**
     * countryController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('client.credentials');
    }

    /**
     * @param \App\Activity $activity
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Activity $activity)
    {
        $attachments = $activity->attachment;

        return $this->showAll($attachments,Attachment::class);
    }
}
