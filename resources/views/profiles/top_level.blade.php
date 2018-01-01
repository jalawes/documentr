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
        <figure class="image is-96x96">
            <img src="{{ $profile_user->avatar }}" class="is-profile-image">
        </figure>
    </div>
</nav>
