@extends('layouts.app')

@section('content')
<div class="card">
    <header class="card-header">
        <p class="card-header-title">Documents</p>
    </header>

    <div class="card-content">
        <table class="table is-fullwidth is-hoverable">
            <thead>
                <tr>
                    <th>File</th>
                    <th>Owner</th>
                    <th class="has-text-right">Created</th>
                </tr>
            </thead>
            @foreach($documents as $document)
            <tr>
                <td>
                    <icon name="file-text-o"></icon>
                    <a href="{{ $document->path() }}">{{ $document->filename }}</a>
                </td>
                <td>
                    <icon name="user"></icon>
                    <a href="#">{{ $document->owner->name }}</a>
                </td>
                <td class="has-text-right">
                    <icon name="clock-o"></icon>
                    {{ $document->created_at->diffForHumans() }}
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
