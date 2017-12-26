<?php

namespace Tests\Feature;

use App\Library;
use App\User;
use Tests\TestCase;

class LibrariesTest extends TestCase
{
    public function test_an_authenticated_user_can_join_a_library()
    {
        $user = create(User::class);
        $library = create(Library::class);
        $user->joinLibrary($library);
        static::assertCount(1, $user->libraries);
    }

    public function test_an_authenticated_user_can_join_many_libraries()
    {
        $user = create(User::class);
        $library_one = create(Library::class);
        $library_two = create(Library::class);
        $user->joinLibrary($library_one);
        $user->joinLibrary($library_two);
        static::assertCount(2, $user->libraries);
    }

    public function test_an_authenticated_user_can_browse_libraries()
    {
        $library = create(Library::class, [
            'private' => false,
        ]);
        $this->signIn();
        $response = $this->get(route('libraries.index'));
        $response->assertSee($library->name);
    }
}
