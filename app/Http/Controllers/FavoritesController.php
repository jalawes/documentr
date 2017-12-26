<?php

namespace App\Http\Controllers;

use App\Document;
use App\Favorite;
use DB;

class FavoritesController extends Controller
{

    /**
     * FavoritesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param \App\Document $document
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Document $document)
    {
        $document->favorite();
        return back();
    }
}
