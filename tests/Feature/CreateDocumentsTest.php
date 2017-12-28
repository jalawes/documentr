<?php

namespace Tests\Feature;

use App\Activity;
use App\Document;
use App\Library;
use Tests\TestCase;

class CreateDocumentsTest extends TestCase
{
    public function test_an_authenticated_user_can_view_all_documents()
    {
        $document = create(Document::class, [
            'private' => false,
        ]);

        $this->signIn();

        $response = $this->get(route('documents.index'));
        $response->assertSee($document->title);
    }

    public function test_an_authenticated_user_can_create_a_new_document()
    {
        $this->signIn();
        $this->get(route('documents.create'))
             ->assertStatus(200);
    }

    public function test_a_guest_cannot_create_a_new_document()
    {
        $this->assertUnauthenticated();
        $this->get(route('documents.create'))
             ->assertRedirect(route('login'));
    }

    public function test_an_authenticated_user_can_submit_new_documents()
    {
        $this->signIn();

        $title = 'Jamals New Document';

        $response = $this->publishDocument([
            'title'   => $title,
            'private' => false,
        ]);

        $this->get($response->headers->get('Location'))
             ->assertSee($title);
    }

    public function test_a_guest_cannot_store_a_new_document()
    {
        $this->assertUnauthenticated();

        $document = make('App\Document');

        $this->post(route('documents.store', $document->toArray()));
    }

    public function test_a_document_can_belong_to_a_library()
    {
        $library = create(Library::class);

        $document = create(Document::class, [
            'library_id' => $library
        ]);

        static::assertEquals($library->name, $document->library->name);
    }

    public function test_an_authenticated_user_can_view_a_document()
    {
        $this->signIn();

        $document = create(Document::class, [
            'private' => false
        ]);

        $this->get($document->path())->assertSee($document->body);
    }

    public function test_a_document_requires_a_title()
    {
        $this->publishDocument(['title' => null])
             ->assertSessionHasErrors('title');
    }

    public function test_a_document_requires_a_body()
    {
        $this->publishDocument(['body' => null])
             ->assertSessionHasErrors('body');
    }

    public function test_a_document_must_have_valid_library_id_when_provided()
    {
        createMany(Library::class, random_int(2, 5));

        $this->publishDocument(['library_id' => null])
             ->assertSessionMissing('library_id');

        $this->publishDocument(['library_id' => 9999])
             ->assertSessionHasErrors('library_id');
    }

    public function test_authorized_users_may_delete_threads()
    {
        $this->signIn();

        $document = create(Document::class, ['user_id' => auth()->id()]);

        $this->delete(route('documents.destroy', $document))
             ->assertRedirect(route('documents.index'));

        $this->assertDatabaseMissing('documents', $document->toArray());
        $this->assertDatabaseMissing('favorites', [
            'user_id'        => auth()->id(),
            'favoritable_id' => $document->id,
        ]);
        $this->assertCount(0, Activity::all());
    }

    public function test_unauthorized_users_may_not_delete_threads()
    {
        $document = create(Document::class);

        $this->delete(route('documents.destroy', $document))->assertRedirect('login');
        $this->assertDatabaseHas('documents', $document->toArray());

        $this->signIn();
        $this->delete(route('documents.destroy', $document))->assertStatus(403);
        $this->assertDatabaseHas('documents', $document->toArray());
    }

    protected function publishDocument(array $attributes = [])
    {
        $this->signIn();

        $document = make(Document::class, $attributes);

        return $this->post(route('documents.store', $document->toArray()));
    }
}
