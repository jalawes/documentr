@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Profile</p>
            <a href="{{ route('logout') }}"
               class="card-header-icon"
               aria-label="more options"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <button class="button is-info">Log Out</button>
                {{--<form id="logout-form" action="{{ route('logout') }}" method="POST">--}}
                    {{--{{ csrf_field() }}--}}
                {{--</form>--}}
            </a>
        </header>
        <div class="card-content">

        </div>
    </div>

</div>

@endsection
