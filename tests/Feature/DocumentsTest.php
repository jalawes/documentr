<?php

namespace Tests\Feature;

use Tests\TestCase;

class DocumentsTest extends TestCase
{

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
