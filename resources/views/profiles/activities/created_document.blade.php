@component('profiles.activities.activity')
    @slot('heading')
        <icon name="file-text-o"></icon>
        {{ $profile_user->first_name }} published
        <a href="{{ $activity->subject->path() }}">{{ $activity->subject->title }}</a>.
    @endslot
@endcomponent
