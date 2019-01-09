<?php

namespace App\Http\Controllers\Api\Permission;

use App\Http\Controllers\ApiController;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class roleController extends ApiController
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show', 'update', 'store', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return $this->showAll($roles,Role::class);
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
        $rules = ['name' => 'required|unique:roles'];

        $this->validate($request, $rules);

        $data = Role::create($request->all());
	
		return $this->successResponse(['data' => $data, 'message' => 'Role Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Role $role
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return $this->showOne($role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Role                $role
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role->fill($request->all());
        if ($role->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $role->save();

        return $this->showOne($role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Role $role
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return $this->showOne($role);
    }
}
