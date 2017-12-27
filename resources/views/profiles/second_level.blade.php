<nav class="level">
    <div class="level-left">
        <div class="level-item has-text-centered">
            <div>
                <p class="heading">Since</p>
                <p class="title is-5">{{ $profile_user->created_at->toFormattedDateString() }}</p>
            </div>
        </div>
    </div>
    <div class="level-right">
        <div class="level-item has-text-centered">
            <div>
                <p class="heading">Documents</p>
                <p class="title is-5">{{ $profile_user->documents->count() }}</p>
            </div>
        </div>
    </div>
</nav>
