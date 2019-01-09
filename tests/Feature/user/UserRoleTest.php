<?php

namespace Tests\Feature\user;

use App\User;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UserRoleTest extends TestCase
{
    protected $url   = 'api/v1/users/';
    protected $table = 'users';

    public function test_user_role_list()
    {
        $role = factory(Role::class)->create();
        $user = factory(User::class)->create();
        $user->syncRoles($role);
        $response = $this->get($this->url.$user->id.'/roles', $this->headers());
        $response->assertStatus(200);
        $response->assertJson(['data' => [$role->toarray()]]);
    }

    public function test_user_role_attach()
    {
        $role     = factory(Role::class)->create();
        $user     = factory(User::class)->create();
        $response = $this->put($this->url.$user->id.'/roles/'.$role->id, [], $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($role->toarray()), $role->toarray());
        $response->assertJson(['data' => [$role->toarray()]]);
    }
}
