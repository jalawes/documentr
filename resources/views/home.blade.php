@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-6">
                @include('layouts.partials.status')
                <h1 class="title is-size-4">Latest</h1>
            </div>
        </div>
        @foreach($documents as $document)
            <div class="columns is-centered">
                <div class="column is-6">
                    @include('layouts.partials.document_card', $document)
                </div>
            </div>
        @endforeach
    </div>
@endsection
