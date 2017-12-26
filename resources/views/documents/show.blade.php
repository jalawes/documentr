@extends('layouts.app')

@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">{{ $document->title }}</p>
        </header>

        <div class="card-content">
            <div class="content">
                <vue-markdown>
                    {{ $document->body }}
                </vue-markdown>
            </div>
        </div>
    </div>
@endsection
