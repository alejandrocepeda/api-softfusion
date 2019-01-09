<?php

namespace App\Http\Controllers\Api\Activity;

use App\Activity;
use App\Email;
use App\Http\Controllers\ApiController;
use App\Http\Resources\ActivityResource;
use Illuminate\Http\Request;

class ActivityController extends ApiController
{
    /**
     * addressController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show', 'update', 'store', 'destroy']);
        $this->middleware('client.credentials')->only(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activitys = Activity::all();

        return $this->showAll($activitys,Activity::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ['description' => 'required',
                  'user_id'     => 'required',
                  'assistants'  => 'sometimes|array',
                  'notified'    => 'boolean', ];
        $this->validate($request, $rules);

        $data = Activity::create($request->all());

        if ($request->has('assistants')) {
            $data->assistants()->sync(collect($request->assistants)->pluck('id'));
        }

        if ($request->has('email_id')) {
            Email::findorfail($request->email_id)->update(['activity_id' => $data->id]);
        }

        return $this->successResponse(['data' => new ActivityResource($data), 'message' => 'Activity Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Activity $activity
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        return $this->showOne($activity);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Image               $activity
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        $rules = ['description' => 'required',
                  'user_id'     => 'required',
                  'assistants'  => 'sometimes|array',
                  'notified'    => 'boolean', ];

        $this->validate($request, $rules);

        $activity->fill($request->all());
        if ($activity->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $activity->save();

        if ($request->has('assistants')) {
            $activity->assistants()->sync(collect($request->assistants)->pluck('id'));
        }

        if ($request->has('email_id')) {
            Email::findorfail($request->email_id)->update(['activity_id' => $activity->id]);
        }

        return $this->successResponse(['data' => new ActivityResource($activity), 'message' => 'Activity Updated']);
    }

    /**
     * @param \App\Activity $activity
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Exception
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();

        return $this->successResponse(['data' => new ActivityResource($activity), 'message' => 'Activity Deleted']);
    }
}
