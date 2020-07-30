<?php

namespace Tests\Feature;

use App\User;
use App\UserInfo;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_guest_should_be_able_to_see_anybody_profile()
    {
        $user = factory(User::class)->create();
        UserInfo::insert([ 'user_id' => $user->id ]);

        $response = $this->get($user->username);

        $response
            ->assertSuccessful()
            ->assertSeeText($user->name);
    }

    public function test_user_should_be_able_to_see_edit_profile_button()
    {
        $user = factory(User::class)->create();
        UserInfo::insert([ 'user_id' => $user->id ]);

        $response = $this
            ->actingAs($user)
            ->get($user->username);

        $response
            ->assertSuccessful()
            ->assertSeeText($user->name)
            ->assertSeeText('Edit Profile');
    }

    public function test_user_should_be_able_to_edit_their_profile()
    {
        $user = factory(User::class)->create();
        UserInfo::insert([ 'user_id' => $user->id ]);

        $response = $this
            ->actingAs($user)
            ->get($user->username . '/edit');

        $response->assertSuccessful();
    }

    public function test_user_should_not_be_able_to_edit_other_user_profile()
    {
        $users = factory(User::class, 2)->create();
        foreach ($users as $user) {
            UserInfo::insert([ 'user_id' => $user->id ]);
        }

        $response = $this
            ->actingAs($users[0])
            ->get($users[1]->username . '/edit');

        $response->assertStatus(403);
    }
}
