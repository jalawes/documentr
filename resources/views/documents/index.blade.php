@extends('layouts.app')

@section('content')
<table class="table">
    @foreach($documents as $document)
        {{ $document->title }}
    @endforeach
</table>
@endsection
