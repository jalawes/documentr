@extends('layouts.app')

@section('content')
    <div class="columns is-centered">
        <div class="column is-6">
            @each('layouts.partials.document_card', $documents, 'document')
        </div>
    </div>
@endsection
