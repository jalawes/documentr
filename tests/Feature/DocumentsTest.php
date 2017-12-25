<?php

namespace Tests\Feature;

use App\Document;
use Tests\TestCase;

class DocumentsTest extends TestCase
{
    public function test_an_authenticated_user_can_view_all_documents()
    {
        $document = create(Document::class);
        $this->signIn();
        $response = $this->get(route('documents.index'));
        $response->assertSee($document->title);
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
}
