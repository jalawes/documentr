{{-- Navbar --}}
<nav class="navbar is-transparent is-fixed-top">
    <div class="container">
        {{-- Navbar Brand --}}
        <div class="navbar-brand">
            <a class="navbar-item" href="{{ env('APP_URL') }}">
                <img src="{{ asset('img/documentr-512w.png') }}" alt="{{ env('APP_TAG') }}" width="112" height="28">
            </a>
            {{-- Navbar Hamburger--}}
            <div class="navbar-burger burger" data-target="navbar">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        @auth
            {{-- Navbar Menu --}}
            <div id="navbar" class="navbar-menu">
                {{-- Navbar Start--}}
                <div class="navbar-start">
                    {{-- Documents Dropdown --}}
                    <div class="navbar-item has-dropdown is-hoverable">
                        <div class="navbar-link">Docs</div>
                        <div class="navbar-dropdown is-boxed">
                            <a class="navbar-item" href="{{ route('documents.index') }}">
                                <p>Browse</p>
                            </a>
                            <hr class="navbar-divider">
                            <a class="navbar-item" href="{{ route('documents.create') }}">
                                <p><strong>Create</strong><br>
                                    <small>Share something brilliant!</small>
                                </p>
                            </a>
                        </div>
                    </div>

                    {{-- Libraries Dropdown --}}
                    <div class="navbar-item has-dropdown is-hoverable">
                        <div class="navbar-link">Libraries</div>
                        <div class="navbar-dropdown is-boxed">
                            <a class="navbar-item" href="{{ route('libraries.index') }}">
                                <p><strong>Browse</strong><br>
                                    <small>See whats new</small>
                                </p>
                            </a>
                            <hr class="navbar-divider">
                            <a class="navbar-item" href="#">Create</a>
                        </div>
                    </div>
                </div>
                {{-- Navbar End --}}
                <div class="navbar-end">
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            <figure class="image is-32x32 person">
                                @if (auth()->user()->avatar)
                                    <img src="{{ auth()->user()->avatar }}" class="is-profile-image">
                                @else
                                    <div class="avatar is-32x32">
                                        <p>{{ get_initials(auth()->user()->name) }}</p>
                                    </div>
                                @endif
                            </figure>
                        </a>
                        <div class="navbar-dropdown is-right is-boxed">
                            <a class="navbar-item" href="{{ route('profiles.show', auth()->user()) }}">
                                <p><strong>{{ auth()->user()->name }}</strong><br>
                                    <small>View My Profile</small>
                                </p>
                            </a>
                            <hr class="navbar-divider">
                            <a href="{{ route('logout') }}"
                               class="navbar-item"
                               aria-label="more options"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Log Out
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    {{ csrf_field() }}
                                </form>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endauth
    </div>
</nav>
