@extends('layouts.app')

@section('title', 'Groups')

@section('content')
    @foreach($groups as $group)
        <div class="columns">
            <div class="column is-12">
                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title">{{ $group->name }}</p>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris.
                            <a href="#">@bulmaio</a>. <a href="#">#css</a> <a href="#">#responsive</a>
                            <br>
                            <time datetime="2016-1-1">{{ $group->created_at->diffForHumans() }}</time>
                        </div>
                    </div>
                    @auth
                        <footer class="card-footer">
                            <a href="#" class="card-footer-item">Join</a>
                        </footer>
                    @endauth
                </div>
            </div>
        </div>
    @endforeach
@endsection
