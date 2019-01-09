<?php

namespace App\Http\Controllers\Api\Permission;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Role $role)
    {
        $permissions = $role->permissions;

        return $this->showAll($permissions,Permission::class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role, Permission $permission)
    {
        if ($role->hasPermissionTo($permission)) {
            return $this->errorResponse('Role already have this permission', 422);
        }

        $role->givePermissionTo($permission);
        $role->refresh();
        $permissions = $role->permissions;

        return $this->showOne($permissions);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role, Permission $permission)
    {
        if (!$role->hasPermissionTo($permission)) {
            return $this->errorResponse('Role don`t have this permission', 422);
        }

        $role->revokePermissionTo($permission);
        $role->refresh();
        $permissions = $role->permissions;

        return $this->showOne($permissions);
    }
}
