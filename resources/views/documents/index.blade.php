@extends('layouts.app')

@section('content')

<table class="table">
    @foreach($documents as $document)
    <tr>
        <td>{{ $document->title }}</td>
    </tr>
    @endforeach
</table>

@endsection
