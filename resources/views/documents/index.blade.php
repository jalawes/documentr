@extends('layouts.app')

@section('title', 'Browsing Documents')

@section('content')
    @foreach ($documents as $document)
        <div class="columns is-centered">
            <div class="column is-6">
                @include('layouts.partials.document_card', $document)
            </div>
        </div>
    @endforeach
@endsection
