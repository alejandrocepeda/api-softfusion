<?php

namespace Tests\Feature;

use App\User;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class RoleUserTest extends TestCase
{
    protected $url   = 'api/v1/roles/';
    protected $table = 'roles';

    public function test_role_user_list()
    {
        $role = factory(Role::class)->create();
        $user = factory(User::class)->create();
        $user->syncRoles($role);
        $response = $this->get($this->url.$role->id.'/users', $this->headers());
        $response->assertStatus(200);
        $response->assertJson(['data' => [$user->toarray()]]);
    }

    public function test_role_user_attach()
    {
        $role     = factory(Role::class)->create();
        $user     = factory(User::class)->create();
        $response = $this->put($this->url.$role->id.'/users/'.$user->id, [], $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($user->toarray()), $user->toarray());
        $response->assertJson(['data' => [$user->toarray()]]);
    }

    public function test_role_user_dettach()
    {
        $role = factory(Role::class)->create();
        $user = factory(User::class)->create();
        $user->syncRoles($role);
        $response = $this->delete($this->url.$role->id.'/users/'.$user->id, [], $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($user->toarray()), $user->toarray());
        $response->assertJsonMissing(['data' => [$user->toarray()]]);
    }
}
