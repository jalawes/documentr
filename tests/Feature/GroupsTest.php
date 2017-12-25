<?php

namespace Tests\Feature;

use App\Group;
use App\User;
use Tests\TestCase;

class GroupsTest extends TestCase
{
    public function test_an_authenticated_user_can_join_a_group()
    {
        $user = create(User::class);
        $group = create(Group::class);
        $user->joinGroup($group);
        static::assertCount(1, $user->groups);
    }

    public function test_an_authenticated_user_can_join_many_groups()
    {
        $user = create(User::class);
        $group_one = create(Group::class);
        $group_two = create(Group::class);
        $user->joinGroup($group_one);
        $user->joinGroup($group_two);
        static::assertCount(2, $user->groups);
    }

    public function test_an_authenticated_user_can_browse_groups()
    {
        $group = create(Group::class, [
            'private' => false,
        ]);
        $this->signIn();
        $response = $this->get(route('groups.index'));
        $response->assertSee($group->name);
    }
}
