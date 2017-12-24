<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;

    protected function signIn($user = null)
    {
        $user = $user ?? create(User::class);
        $this->actingAs($user);
        return $this;
    }
}
