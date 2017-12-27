@extends('layouts.app')

@section('title', $document->title)

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
        @can('update', $document)
            <footer class="card-footer">
                <form action="{{ route('documents.destroy', $document) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="field">
                        <p class="control card-footer-item">
                            <button class="button is-danger is-small" type="submit">Delete</button>
                        </p>
                    </div>
                </form>
            </footer>
        @endcan
    </div>
@endsection
