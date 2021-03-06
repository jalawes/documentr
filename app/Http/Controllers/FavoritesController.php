<?php

namespace App\Http\Controllers;

use App\Document;

class FavoritesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Document $document)
    {
        $document->favorite();
        // return back()->with('flash', "{$document->title} added to favorites.");
    }

    public function destroy(Document $document)
    {
        $document->unfavorite();
    }
}
