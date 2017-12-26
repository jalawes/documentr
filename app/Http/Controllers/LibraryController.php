<?php

namespace App\Http\Controllers;

use App\Library;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libraries = Library::public()->latest()->get();
        return view('libraries.index', compact('libraries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Library $group
     * @return \Illuminate\Http\Response
     */
    public function show(Library $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Library $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Library $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Library             $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Library $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Library $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Library $group)
    {
        //
    }
}
