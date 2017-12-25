@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card">
        <header class="card-header">
            <p class="card-header-title">{{ $document->filename }}</p>
        </header>

        <div class="card-content">
            <vue-markdown>
                {{ $document->body }}
            </vue-markdown>
        </div>
    </div>
</div>
@endsection
