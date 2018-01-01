@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-4">
                @include('auth.partials.form')
            </div>
        </div>
    </div>
@endsection
