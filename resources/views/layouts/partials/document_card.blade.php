<div class="columns">
    <div class="column">
        <div class="card">
            <div class="card-content">
                <div class="media">
                    <div class="media-left">
                        <figure class="image is-32x32">
                            <img src="{{ $document->owner->photo_path }}" class="is-profile-image">
                        </figure>
                    </div>
                    <div class="media-content">
                        <a href="{{ $document->owner->path() }}">
                            <p class="title is-6 has-text-info">{{ $document->owner->name }}</p>
                        </a>
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
    </div>
</div>
