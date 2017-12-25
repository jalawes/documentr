<?php

namespace Tests\Unit;

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
}
