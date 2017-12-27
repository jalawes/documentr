<?php

namespace Tests\Feature;

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
}
