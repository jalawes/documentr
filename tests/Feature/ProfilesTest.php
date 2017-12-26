<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProfilesTest extends TestCase
{
    public function test_an_authenticated_user_can_see_his_her_profile()
    {
        $this->signIn();
        $this->get(route('profile.index'))->assertStatus(200);
    }

    public function test_an_unauthorized_user_cannot_visit_profile()
    {
        $this->assertUnauthenticated();
        $this->get(route('profile.index'))->assertRedirect(route('login'));
    }
}
