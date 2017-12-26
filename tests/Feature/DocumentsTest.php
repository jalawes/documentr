<?php

namespace Tests\Feature;

use App\Document;
use App\Library;
use Tests\TestCase;

class DocumentsTest extends TestCase
{
    public function test_an_authenticated_user_can_view_all_documents()
    {
        $document = create(Document::class);
        $this->signIn();
        $response = $this->get(route('documents.index'));
        $response->assertSee($document->filename);
    }

    public function test_an_authenticated_user_can_create_a_new_document()
    {
        $this->signIn();
        $this->get(route('documents.create'))->assertStatus(200);
    }

    public function test_an_authenticated_user_cannot_create_a_new_document()
    {
        $this->get(route('documents.create'))->assertStatus(302);
    }

    public function test_a_document_can_belong_to_a_library()
    {
        $library = create(Library::class);
        $document = create(Document::class, [
            'library_id' => $library
        ]);
        static::assertEquals($library->name, $document->library->name);
    }

    public function test_a_document_does_not_have_to_belong_to_a_library()
    {
        $document = create(Document::class);
        static::assertEmpty($document->library);
    }

    public function test_an_authenticated_user_can_view_a_document()
    {
        $this->signIn();
        $document = create(Document::class, [
            'private' => false
        ]);
        $this->get($document->path())->assertSee($document->body);
    }
}
