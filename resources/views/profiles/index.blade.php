@extends('layouts.app')

@section('title', 'Profile')

@section('content')

    {{--Profile Panel--}}
    <div class="columns is-centered">
        <div class="column is-6">
            @include('profiles.top_level')
            @include('profiles.second_level')
            @can('update', $profile_user)
                @include('profiles.profile_panel')
            @endcan
        </div>
    </div>

    {{--Separate activities by date--}}
    @forelse($activities as $date => $collection)

        {{--Divider--}}
        <div class="columns is-centered">
            <div class="column is-6">
                <date :date-time="{{ json_encode($date) }}" inline-template>
                    <div class="is-divider" :data-content="ago"></div>
                </date>
            </div>
        </div>

        {{--Activity--}}
        @foreach($collection as $activity)
            <div class="columns is-centered">
                <div class="column is-6">
                    @includeIf("profiles.activities.{$activity->type}")
                </div>
            </div>
        @endforeach
    @empty
        <div class="columns is-centered">
            <div class="column is-6 has-text-centered">
                This user has no activity!
            </div>
        </div>
    @endforelse

@endsection
