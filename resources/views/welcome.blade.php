@extends('layouts.fullscreen')

@section('content')

<section class="hero is-info is-fullheight is-bold">
    <div class="hero-head">
        @include('layouts.partials.navbar')
    </div>

    <div class="hero-body">
        <div class="container has-text-centered">
            <p class="title">Documentr</p>
            <p class="subtitle">Realtime Markdown Editor for Developers</p>
        </div>
    </div>
</section>

@endsection
