@extends('layouts.app')

@section('content')
<div class="container">
    <div class="column is-12">
        {{-- <markdown-create></markdown-create> --}}
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>
</div>
@endsection
