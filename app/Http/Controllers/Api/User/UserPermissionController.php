<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\ApiController;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class UserPermissionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $permissions = $user->getAllPermissions();

        return $this->showOne($permissions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, Permission $permission)
    {
        if ($user->hasPermissionTo($permission)) {
            return $this->errorResponse('User already has this Permission', 422);
        }

        $user->givePermissionTo($permission);
        $user->refresh();
        $permissions = $user->getAllPermissions();

        return $this->showOne($permissions);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Permission $permission)
    {
        if (!$user->hasPermissionTo($permission)) {
            return $this->errorResponse('User doesn`t have this role', 422);
        }

        $user->revokePermissionTo($permission);
        $user->refresh();
        $permissions = $user->getAllPermissions();

        return $this->showOne($permissions);
    }
}
