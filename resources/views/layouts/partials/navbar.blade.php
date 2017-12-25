<nav class="navbar is-transparent">
    <div class="navbar-brand">
        <a class="navbar-item" href="{{ env('APP_URL') }}">
            <img src="{{ asset('img/documentr-512w.png') }}"
                 alt="Documentr: Realtime Markdown Editing for Developers"
                 width="112"
                 height="28">
        </a>
        <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div id="navbarExampleTransparentExample" class="navbar-menu">
        <div class="navbar-start">
            @auth
            <div class="navbar-item has-dropdown is-hoverable">
                <div class="navbar-link">
                    Docs
                </div>
                <div class="navbar-dropdown is-boxed">
                    <a class="navbar-item" href="{{ route('documents.index') }}">Browse</a>
                    <a class="navbar-item" href="{{ route('documents.create') }}">Create</a>
                </div>
            </div>
            @endauth
        </div>

        <div class="navbar-end">
            @auth
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        <figure class="image is-32x32">
                            <img src="https://bulma.io/images/placeholders/32x32.png" class="is-profile-image">
                        </figure>
                    </a>
                    <div class="navbar-dropdown is-right is-boxed">
                        <div class="navbar-item">{{ Auth::user()->name }}</div>
                        <a class="navbar-item" href="{{ route('profile.index') }}">Profile</a>
                        <hr class="navbar-divider">
                        <a href="{{ route('logout') }}"
                           class="navbar-item"
                           aria-label="more options"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </a>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</nav>
