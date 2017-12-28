<?php

namespace Tests\Feature;

use App\Activity;
use App\Document;
use Tests\TestCase;

class ActivityTest extends TestCase
{

    public function test_it_records_activity_when_a_document_is_created()
    {
        $this->signIn();

        $document = create(Document::class);

        $this->assertDatabaseHas('activities', [
            'user_id'      => auth()->id(),
            'subject_id'   => $document->id,
            'subject_type' => Document::class,
            'type'         => 'created_document',
        ]);
    }

    public function test_it_fetches_an_activity_feed_for_any_user()
    {
        $this->signIn();

        $document = create(Document::class, [
            'user_id' => auth()->id(),
            'private' => false,
        ]);

        $feed = Activity::feed(auth()->user(), 10);

        static::assertTrue(
            $feed->contains(function ($value) use ($document) {
                return $value->id === $document->id;
            })
        );
    }
}
