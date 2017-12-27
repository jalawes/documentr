@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
    <div class="column is-6 is-offset-3">
        @include('profiles.top_level')
        @include('profiles.second_level')
        @include('profiles.profile_panel')
    </div>
@endsection
