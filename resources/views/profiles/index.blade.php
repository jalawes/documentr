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
                <button class="button is-info is-small">Log Out</button>
                {{--<form id="logout-form" action="{{ route('logout') }}" method="POST">--}}
                    {{--{{ csrf_field() }}--}}
                {{--</form>--}}
            </a>
        </header>
        <div class="card-content">
            <div class="column is-3">
                <div class="field">
                    <label class="label">Email</label>
                    <div class="control has-icons-left">
                        <input class="input" type="email" placeholder="Email input" value="{{ $user->email }}">
                        <span class="icon is-small is-left">
                            <i class="fa fa-envelope"></i>
                        </span>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Name</label>
                    <div class="control has-icons-left">
                        <input class="input" type="text" placeholder="John Doe" value="{{ $user->name }}">
                        <span class="icon is-small is-left">
                            <i class="fa fa-address-card-o"></i>
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection
