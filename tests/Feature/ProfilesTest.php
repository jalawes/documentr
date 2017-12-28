<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;

class ProfilesTest extends TestCase
{
    public function test_an_authenticated_user_can_see_his_her_profile()
    {
        $user = create(User::class);

        $this->signIn($user);

        $this->get(route('profiles.show', $user))
             ->assertStatus(200)
             ->assertSee($user->name);
    }

    public function test_an_unauthorized_user_cannot_visit_profile()
    {
        $user = create(User::class);

        $this->assertUnauthenticated();
        $this->get(route('profiles.show', $user))
             ->assertRedirect(route('login'));
    }

    public function test_an_authenticated_user_can_update_profile()
    {
        $user = create(User::class);
        $this->signIn($user);
        $this->post(route('profiles.update', [
            'first_name' => $this->faker->firstName,
        ]))
            ->assertSessionMissing('errors');
    }
}
