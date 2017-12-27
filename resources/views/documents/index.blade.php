@extends('layouts.app')

@section('content')
    <div class="column is-6 is-offset-3">
        @each('layouts.partials.document_card', $documents, 'document')
    </div>
@endsection
