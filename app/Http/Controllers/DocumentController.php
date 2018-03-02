<?php

namespace App\Http\Controllers;

use App\Document;
use App\Http\Requests\StoreDocument;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('documents.index')->with([
            'documents' => Document::with('owner')->public()->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreDocument $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocument $request)
    {
        $document = Document::create(
            array_merge($request->all(), [
                'user_id' => auth()->id(),
            ])
        );

        if (request()->wantsJson()) {
            return response([], 202);
        }

        return redirect($document->path())->with('flash', 'Your document has been published!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Document $document
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        return view('documents.show')->with(['document' => $document]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Document $document
     *
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Document $document)
    {
        $this->authorize('update', $document);

        $document->update([
            'body' => request('body'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document $document
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function destroy(Document $document)
    {
        $this->authorize('update', $document);

        $document->delete();

        if (request()->wantsJson()) {
            return response([], 204);
        }

        return redirect()->route('documents.index')->with('flash', "Deleted {$document->title}.");
    }
}
