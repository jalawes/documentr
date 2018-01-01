<nav class="level">
    <!-- Left side -->
    <div class="level-left">
        <div class="level-item has-text-centered">
            <div>
                <p class="title">{{ $profile_user->name }}</p>
            </div>
        </div>
    </div>
    <!-- Right side -->
    <div class="level-right">
        <figure class="image is-96x96 person">
            @if ($profile_user->avatar)
                <img src="{{ $profile_user->avatar }}" class="is-profile-image">
            @else
                <div class="avatar is-96x96">
                    <p class="is-size-1">{{ first_last_initials($profile_user->name) }}</p>
                </div>
            @endif
        </figure>
    </div>
</nav>
