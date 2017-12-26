<?php

namespace Tests\Feature;

use App\Document;
use Exception;
use Tests\TestCase;

class FavoritesTest extends TestCase
{

    public function test_guests_cannot_favorite_anything()
    {
        $document = create(Document::class);
        $this->post(route('documents.favorites.store', $document))
             ->assertRedirect(route('login'));
    }

    public function test_an_authenticated_user_can_favorite_a_doc()
    {
        $this->disableExceptionHandling();
        $document = create(Document::class, ['private' => false]);
        $this->signIn();
        $this->post($document->path() . '/favorites');
        static::assertCount(1, $document->favorites);
    }

    public function test_an_authenticated_user_may_only_favorite_a_doc_once()
    {
        $this->disableExceptionHandling();
        $this->signIn();
        $document = create(Document::class, ['private' => false]);

        try {
            $this->post($document->path() . '/favorites');
            $this->post($document->path() . '/favorites');
        } catch (Exception $exception) {
            $this->fail('Did not expect to insert the same record twice.');
        }

        static::assertCount(1, $document->favorites);
    }
}
