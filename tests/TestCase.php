<?php

namespace Tests;

use App\Exceptions\Handler;
use App\User;
use Exception;
use Faker\Factory as Faker;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;

    protected $faker;

    public function __construct()
    {
        parent::__construct();
        $this->faker = Faker::create();
    }

    protected function signIn($user = null)
    {
        $user = $user ?? create(User::class);
        $this->actingAs($user);
        return $this;
    }

    protected function disableExceptionHandling()
    {
        $this->app->instance(ExceptionHandler::class, new class extends Handler {
            public function __construct()
            {
            }

            public function report(Exception $e)
            {
                // no-op
            }

            public function render($request, Exception $e)
            {
                throw $e;
            }
        });
    }

    protected function assertException($exception)
    {
        $this->disableExceptionHandling();
        $this->expectException($exception);
    }

    protected function assertUnauthenticated()
    {
        $this->assertException(AuthenticationException::class);
    }
}
