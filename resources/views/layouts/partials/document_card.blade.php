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
                            <p class="title is-6 has-text-info">{{ $document->owner->name }}</p></a>
                        <p class="subtitle is-7">{{ $document->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="media-right">
                        <div class="buttons">
                            {{-- todo: remove this duplication: --}}
                            @if($document->isFavorited())
                                <button class="button is-white is-disabled">
                                        <span class="has-text-warning icon is-small tooltip"
                                              data-tooltip="{{ $document->favorites_count }} stars">
                                            <i class="fa fa-star"></i>
                                        </span>
                                </button>
                            @else
                                <form action="{{ route('documents.favorites.store', $document) }}" method="POST">
                                    {{ csrf_field() }}
                                    <button type="submit" class="button is-white">
                                        <span class="has-text-warning icon is-small tooltip"
                                              data-tooltip="{{ $document->favorites_count }} stars">
                                            <i class="fa fa-star-o"></i>
                                        </span>
                                    </button>
                                </form>
                            @endif
                        </div>
                        {{--<nav class="level is-mobile">--}}
                            {{--<div class="level-left">--}}
                                {{--<form action="{{ route('documents.favorites.store', $document) }}" method="POST">--}}
                                    {{--{{ csrf_field() }}--}}
                                    {{--@if($document->isFavorited())--}}
                                        {{--<span class="has-text-warning icon is-small">--}}
                                            {{--<i class="fa fa-star"></i>--}}
                                        {{--</span>--}}
                                    {{--@else--}}
                                    {{--<button type="submit" class="button is-white">--}}
                                        {{--<span class="has-text-warning icon is-small">--}}
                                            {{--<i class="fa fa-star-o"></i>--}}
                                        {{--</span>--}}
                                    {{--</button>--}}
                                    {{--@endif--}}
                                {{--</form>--}}
                            {{--</div>--}}
                        {{--</nav>--}}
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
