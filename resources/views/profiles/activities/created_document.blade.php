@component('profiles.activities.activity')
    @slot('heading')
        <p>
            <icon name="file-text-o"></icon>
            {{ $profile_user->first_name }} published
            <a href="{{ $activity->subject->path() }}">{{ $activity->subject->title }}</a>.
        </p>
    @endslot
@endcomponent
