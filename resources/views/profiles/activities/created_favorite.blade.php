@component('profiles.activities.activity')
    @slot('heading')
        <nav class="level">
            {{-- Left Side --}}
            <div class="level-left">
                <div class="level-item">
                    <p class="subtitle is-5">
                        <icon name="star" class="has-text-warning"></icon>
                        {{ $profile_user->first_name }} favorited
                        <a href="{{ $activity->subject->favoritable->path() }}">{{ $activity->subject->favoritable->title }}</a>.
                    </p>
                </div>
            </div>
            {{-- Right Side --}}
            <div class="level-right">
                <p class="level-item is-size-7">
                    <icon name="clock-o"></icon>
                    <date date-time="{{ $activity->subject->created_at }}" inline-template>
                        <span v-text="secondsAgo"></span>
                    </date>
                </p>
            </div>
        </nav>
    @endslot
@endcomponent
