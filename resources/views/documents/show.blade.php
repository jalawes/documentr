@extends('layouts.app')

@section('content')
<div class="container">
    <div class="content">
        {{ $document->filename }}
        <vue-markdown>
            {{ $document->body }}
        </vue-markdown>
    </div>
</div>
@endsection
