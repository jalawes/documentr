<?php

namespace Tests\Unit;

use App\Library;
use Tests\TestCase;

class LibraryTest extends TestCase
{
    public function test_a_library_has_a_name()
    {
        $library = create(Library::class);
        static::assertNotEmpty($library->name);
    }

    public function test_libraries_have_public_scope()
    {
        create(Library::class, [
            'private' => true,
        ]);

        create(Library::class, [
            'private' => false,
        ]);

        static::assertCount(1, Library::public()->get());
    }
}
