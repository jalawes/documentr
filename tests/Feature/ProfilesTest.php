<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;

class ProfilesTest extends TestCase
{
    public function test_an_authenticated_user_can_see_his_her_profile()
    {
        // given an authenticated user
        $user = create(User::class);
        // assert that the user can visit the profile page
        //
    }
}
