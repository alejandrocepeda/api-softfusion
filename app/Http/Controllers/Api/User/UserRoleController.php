<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\ApiController;
use App\User;
use Illuminate\Support\Facades\Request;
use Spatie\Permission\Models\Role;

class UserRoleController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $roles = $user->roles;

        return $this->showAll($roles,Role::class);
    }

    /**
     * @param Request $request
     * @param User    $user
     * @param Role    $role
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, User $user, Role $role)
    {
        if ($user->hasRole($role)) {
            return $this->errorResponse('User already has this Role', 422);
        }

        $user->syncRoles($role);
        $user->refresh();
        $roles = $user->roles;

        return $this->successResponse(['data' => $roles, 'message' => 'Role Updated']);
    }
}
