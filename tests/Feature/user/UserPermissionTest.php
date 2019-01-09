<?php

namespace Tests\Feature;

use App\User;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class UserPermissionTest extends TestCase
{
    protected $url   = 'api/v1/users/';
    protected $table = 'users';

    public function test_user_permission_list()
    {
        $permission = factory(Permission::class)->create();
        $user       = factory(User::class)->create();
        $user->givePermissionTo($permission);
        $response = $this->get($this->url.$user->id.'/permissions', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonFragment($permission->toarray());
    }

    public function test_user_permission_attach()
    {
        $permission = factory(Permission::class)->create();
        $user       = factory(User::class)->create();
        $response   = $this->put($this->url.$user->id.'/permissions/'.$permission->id, [], $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($permission->toarray()), $permission->toarray());
        $response->assertJsonFragment($permission->toarray());
    }

    public function test_user_permission_dettach()
    {
        $permission = factory(Permission::class)->create();
        $user       = factory(User::class)->create();
        $user->givePermissionTo($permission);
        $response = $this->delete($this->url.$user->id.'/permissions/'.$permission->id, [], $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($permission->toarray()), $permission->toarray());
    }
}
