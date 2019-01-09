<?php

namespace App\Http\Controllers\Api\Permission;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionRoleController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Permission $permission)
    {
        $roles = $permission->roles;

        return $this->showAll($roles,Role::class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission, Role $role)
    {
        if ($role->hasPermissionTo($permission)) {
            return $this->errorResponse('Permission already have this Role', 422);
        }

        $role->givePermissionTo($permission);
        $permission->refresh();
        $roles = $permission->roles;

        return $this->showOne($roles);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission, Role $role)
    {
        if (!$role->hasPermissionTo($permission)) {
            return $this->errorResponse('Permission don`t have this Role', 422);
        }

        $role->revokePermissionTo($permission);
        $permission->refresh();
        $roles = $permission->roles;

        return $this->showOne($roles);
    }
}
