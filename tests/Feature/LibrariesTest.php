<?php

namespace Tests\Feature;

use App\Library;
use App\User;
use function htmlspecialchars;
use Tests\TestCase;

class LibrariesTest extends TestCase
{
    public function test_an_authenticated_user_can_join_a_library()
    {
        $library = create(Library::class);
        $user    = create(User::class);
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
        $this->get(route('libraries.index'))
             ->assertSee(htmlspecialchars($library->name));
    }

    public function test_a_guest_can_browse_libraries()
    {
        $library = create(Library::class, [
            'private' => false,
        ]);
        $this->get(route('libraries.index'))
             ->assertSee($library->name);
    }

    // jam: implement when publishing libraries
    // public function test_a_library_must_have_a_name()
    // {
    //     $this->publishLibrary(['name' => null])
    //         ->assertSessionHasErrors('name');
    // }

    protected function publishLibrary(array $attributes = [])
    {
        $this->signIn();
        $library = make(Library::class, $attributes);
        return $this->post('/libraries', $library->toArray());
    }
}
