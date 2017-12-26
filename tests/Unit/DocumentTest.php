<?php

namespace Tests\Unit;

use App\User;
use App\Document;
use Tests\TestCase;

class DocumentTest extends TestCase
{
    public function test_a_document_can_be_private()
    {
        create(Document::class, [
            'private' => true
        ]);
        create(Document::class, [
            'private' => false
        ]);
        static::assertCount(1, Document::public()->get());
    }

    public function test_a_document_has_an_owner()
    {
        $user = create(User::class);

        $document = create(Document::class, [
            'user_id' => $user
        ]);
        dd($user, $document);
        static::assertEquals($user->id, $document->owner->id);
    }

    public function test_a_document_has_a_path()
    {
        $document = create(Document::class);
        static::assertNotEmpty($document->path());
    }

    public function test_a_document_has_a_filename()
    {
        $document = create(Document::class);
        static::assertNotEmpty($document->title);
    }

    public function test_a_document_does_not_have_to_belong_to_a_library()
    {
        $document = create(Document::class);
        static::assertEmpty($document->library);
        static::assertCount(1, Document::all());
    }
}
