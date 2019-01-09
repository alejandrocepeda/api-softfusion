<?php

namespace App\Http\Controllers\Api\Team;

use App\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class TeamController extends ApiController
{
    /**
     * addressController constructor.
     */
    public function __construct()
    {
       /* $this->middleware('auth:api')->except(['index', 'show', 'update', 'store', 'destroy']);
        $this->middleware('client.credentials')->only(['index', 'show']);*/
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $team = Team::all();

        return $this->showAll($team,Team::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ['name' => 'required'];
        $this->validate($request, $rules);



        $data = Team::create($request->all());

		return $this->successResponse(['data' => $data, 'message' => 'Team Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function show(Team $team)
    {

        return $this->showOne($team);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Address             $team
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {


    	$team->fill($request->all());
        if ($team->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $team->save();

        return $this->successResponse(['data'=>$team, 'message'=>'Team updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Team $team
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();

        return $this->showOne($team);
    }
}
