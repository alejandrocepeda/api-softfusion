<?php

namespace App\Http\Controllers\Api\Permission;

use App\Http\Controllers\ApiController;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionUserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Permission $permission)
    {
        $users = $permission->users;

        return $this->showOne($users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission, User $user)
    {
        if ($user->hasPermissionTo($permission)) {
            return $this->errorResponse('Permission already have this User', 422);
        }

        $user->givePermissionTo($permission);
        $permission->refresh();
        $users = $permission->users;

        return $this->showOne($users);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission, User $user)
    {
        if (!$user->hasPermissionTo($permission)) {
            return $this->errorResponse('Permission don`t have this User', 422);
        }

        $user->revokePermissionTo($permission);
        $permission->refresh();
        $users = $permission->users;

        return $this->showOne($users);
    }
}
