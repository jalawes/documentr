@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="title">Documents</h1>

    <table class="table is-bordered is-striped is-narrow is-fullwidth">
        <tr>
            <th>Title</th>
            <th class="has-text-right">Created</th>
        </tr>
        @foreach($documents as $document)
        <tr>
            <td>
                <icon name="file-text-o"></icon>
                <a href="{{ $document->path() }}">{{ $document->filename }}</a></td>
            <td class="has-text-right">{{ $document->created_at->diffForHumans() }}</td>
        </tr>
        @endforeach
    </table>
</div>

@endsection
