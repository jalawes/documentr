<div class="card">
    <div class="card-content">
        <div class="media">
            <div class="media-left">
                <figure class="image is-32x32 person tooltip" data-tooltip="{{ $document->owner->name }}">
                    @if ($document->owner->avatar)
                        <img src="{{ $document->owner->avatar }}" class="is-profile-image">
                    @else
                        <div class="avatar is-32x32">
                            <p class="is-size-6">{{ first_last_initials($document->owner->name) }}</p>
                        </div>
                    @endif
                </figure>
            </div>
            <div class="media-content">
                <p class="title is-6 has-text-info">
                    <a href="{{ $document->owner->path() }}">{{ $document->owner->name }}</a>
                </p>

                <p class="subtitle is-7">{{ $document->created_at->diffForHumans() }}</p>
            </div>
            <div class="media-right">
                <div class="buttons">
                    <favorite :document="{{ $document }}"></favorite>
                </div>
            </div>
        </div>
        <div class="content">
            <a href="{{ $document->path() }}">
                <p class="title">{{ $document->title }}</p>
            </a>
            <div class="content">
                <vue-markdown source="{{ $document->body }}"></vue-markdown>
            </div>
        </div>
    </div>
</div>
