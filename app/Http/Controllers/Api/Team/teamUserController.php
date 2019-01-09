<?php

namespace App\Http\Controllers\Api\Team;

use App\Http\Controllers\ApiController;
use App\Team;
use App\User;
use Illuminate\Http\Request;

class teamUserController extends ApiController
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Team $team)
	{
		return $this->showAll($team->users,User::class);
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \App\Team                $team
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Team $team, User $user)
	{
		$team->users()->syncWithoutDetaching($user);
		
		return $this->successResponse(['data' => $user, 'message' => 'User Added']);
		
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Team $team
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Team $team, User $user)
	{
		$team->users()->detach($user);
		
		return $this->successResponse(['data' => $user, 'message' => 'User detached']);
	}
}
