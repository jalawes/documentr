@component('profiles.activities.activity')
    @slot('heading')
        <icon name="star" class="has-text-warning"></icon>
        {{ $profile_user->first_name }} favorited
        <a href="{{ $activity->subject->favoritable->path() }}">{{ $activity->subject->favoritable->title }}</a>.
    @endslot
@endcomponent
