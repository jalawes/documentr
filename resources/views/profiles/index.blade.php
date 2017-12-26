@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
    <div class="column is-6 is-offset-3">
        {{--first level--}}
        <nav class="level">
            <!-- Left side -->
            <div class="level-left">
                <div class="level-item has-text-centered">
                    <div>
                        <p class="title">{{ $profile_user->name }}</p>
                    </div>
                </div>
            </div>
            <!-- Right side -->
            <div class="level-right">
                <figure class="image is-96x96">
                    <img src="{{ $profile_user->photo_path }}" class="is-profile-image">
                </figure>
            </div>
        </nav>
        {{--second level--}}
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
    </div>
    {{--profile--}}
    <div class="column is-6 is-offset-3">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">Profile</p>
                <a href="{{ route('logout') }}"
                   class="card-header-icon"
                   aria-label="more options"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <button class="button is-info is-small">Log Out</button>
                </a>
            </header>
            <div class="card-content">
                <div class="column is-8">
                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control has-icons-left">
                            <input class="input"
                                   type="email"
                                   placeholder="Email input"
                                   value="{{ $profile_user->email }}">
                            <span class="icon is-small is-left"><i class="fa fa-envelope"></i></span>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Name</label>
                        <div class="control has-icons-left">
                            <input class="input"
                                   type="text"
                                   placeholder="John Doe"
                                   value="{{ $profile_user->name }}">
                            <span class="icon is-small is-left"><i class="fa fa-address-card-o"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
