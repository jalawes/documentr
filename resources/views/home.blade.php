@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="column is-6 is-offset-3">
        @include('layouts.partials.status')
        <h1 class="title is-size-4">Latest</h1>
        @each('layouts.partials.document_card', $documents, 'document')
    </div>
</div>
@endsection
