@extends('layouts.fullscreen')

@section('content')

<section class="hero is-info is-fullheight is-bold">
    <div class="hero-head">
        @include('layouts.partials.navbar')
    </div>

    <div class="hero-body">
        <div class="container has-text-centered">
            <p class="title">Documentr</p>
            <markdown-sample></markdown-sample>
        </div>
    </div>
</section>

@endsection
