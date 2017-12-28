@extends('layouts.app')

@section('title', 'My Profile')

@section('content')

    <div class="columns is-centered">
        <div class="column is-6">
            @include('profiles.top_level')
            @include('profiles.second_level')

            @can('update', $profile_user)
                @include('profiles.profile_panel')
            @endcan
        </div>
    </div>

    <div class="columns is-centered">
        <div class="column is-6">
            <div class="is-divider" data-content="ACTIVITY"></div>
        </div>
    </div>

    @forelse($activities as $activity)
        <div class="columns is-centered">
            <div class="column is-6">
                @include("profiles.activities.{$activity->type}")
            </div>
        </div>
    @empty
        <div class="columns is-centered">
            <div class="column is-6 has-text-centered">
                <p>This user has no activity!</p>
            </div>
        </div>
    @endforelse
@endsection
