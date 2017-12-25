<?php

namespace Tests\Unit;

use App\Group;
use Tests\TestCase;

class GroupTest extends TestCase
{
    public function test_a_group_has_a_name()
    {
        $group = create(Group::class);
        static::assertNotEmpty($group->name);
    }
}
