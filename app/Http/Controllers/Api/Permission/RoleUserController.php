<?php

namespace App\Http\Controllers\Api\Permission;

use App\Http\Controllers\ApiController;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleUserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Role $role)
    {
        $users = $role->users;

        return $this->showAll($users,User::class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role, User $user)
    {
        if ($user->hasRole($role)) {
            return $this->errorResponse('Role already has this User', 422);
        }
        $user->syncRoles($role);
        $role->refresh();
        $users = $role->users;

        return $this->showAll($users);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role, User $user)
    {
        if (!$user->hasRole($role)) {
            return $this->errorResponse('Role don`t have this User', 422);
        }
        $user->removeRole($role);
        $role->refresh();
        $users = $role->users;

        return $this->showAll($users);
    }
}
