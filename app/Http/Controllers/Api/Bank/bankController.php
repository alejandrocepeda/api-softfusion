<?php

namespace App\Http\Controllers\Api\Bank;

use App\Bank;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class bankController extends ApiController
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$banks = Bank::all();
		
		return $this->showAll($banks,Bank::class);
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		
		$rules = ['name' => 'required', 'status' => 'boolean'];
		
		$this->validate($request, $rules);
		
		$data = Bank::create($request->all());
		
		return $this->successResponse(['data' => $data, 'message' => 'Bank Created'], 201);
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Bank $bank)
	{
		return $this->showOne($bank);
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param int                      $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
