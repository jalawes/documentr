<div class="columns">
    <div class="column">
        <div class="card">
            <div class="card-content">
                <div class="media">
                    <div class="media-left">
                        <figure class="image is-32x32">
                            <img src="https://bulma.io/images/placeholders/64x64.png" alt="Placeholder image" class="is-profile-image">
                        </figure>
                    </div>
                    <div class="media-content">
                        <p class="title is-6">{{ $document->owner->name }}</p>
                        <p class="subtitle is-7">{{ $document->created_at->toFormattedDateString() }}</p>
                    </div>
                    <div class="media-right">
                        <nav class="level is-mobile">
                            <div class="level-left">
                                <form action="{{ route('documents.favorites.store', $document) }}" method="POST">
                                    {{ csrf_field() }}
                                    <button type="submit" class="button" {{ $document->isFavorited() ? 'disabled' : '' }}>
                                        <span class="has-text-warning icon is-small">
                                            <i class="fa fa-star-o"></i>
                                        </span>
                                        <span>{{ $document->favorites_count }}</span>
                                    </button>
                                </form>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="content">
                    <a href="{{ $document->path() }}">
                        <p class="title">{{ $document->title }}</p>
                    </a>
                    <p>{{ $document->body }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
